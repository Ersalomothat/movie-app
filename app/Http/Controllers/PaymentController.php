<?php

namespace App\Http\Controllers;

use App\Enum\StatusBooking;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment(Request $request, Booking $booking)
    {
        $ticket_price = $booking->showtime->movie["ticket_price"];
        $detail = [
            'booking_id' => $booking["id"],
            'title' => $booking->showtime->movie["title"],
            'seat_number' => $booking->ids_seats,
            'ticket_price' => $ticket_price,
            'showtime' => $booking->showtime
        ];

        $user = User::whereId($booking->user_id)->first();

        $canPay = $user->balance['amount'] >= count(explode(",",$booking["ids_seats"])) * $ticket_price;

        return view('home.payment.payment', [
            'detail' => $detail,
            'user' => $user,
            'isPaid' => false,
            'canPay' => $canPay,
        ]);
    }

    public function makePayment(Request $request, Booking $booking)
    {
        if ($booking->status == StatusBooking::PAID->value) {
            return back()->with('warning', 'Already paid!');
        }

        $user = User::whereId($booking["user_id"])->first();
        $user_balance = $user->balance['amount'];
        $restMoney = $user_balance - $booking->total_price;

        if ( $user_balance < $booking['total_price'] or $restMoney < 0) {
            return back()->with('warning', 'Payment rejected!');
        }

        $user->balance()->update([
            'amount' => $restMoney
        ]);

        $updated = $booking->update([
            'status' => StatusBooking::PAID->value
        ]);
        return back()->with('success', 'Payment accepted! :)');

    }
}

<?php

namespace App\Http\Controllers;

use App\Enum\StatusBooking;
use App\Models\Booking;
use App\Models\Seat;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function cancelMovieBooking(Request $request, Booking $booking) {
        $total_price = $booking["total_price"];
        $user = User::find($booking->user_id);

        $booking->update([
            'status' => StatusBooking::CANCELED->value,
            'total_price' => 0
        ]);

        Seat::whereIn("id",explode(",",$booking["ids_seats"]))->update([
            'is_available' => 0
        ]);
        $user_balance = $user->balance()->first();
        $user_balance->update([
            'amount' => $user_balance["amount"] + $total_price
        ]);
        return back()->with('success', 'Booking canceled');
    }
    public function bookingAgain(Request $request, Booking $booking) {

        return back()->with('success', 'Booking again');
    }
}

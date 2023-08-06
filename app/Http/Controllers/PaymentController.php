<?php

namespace App\Http\Controllers;

use App\Enum\StatusBooking;
use App\Models\Booking;
use App\Models\User;
use App\Services\booking\BookingService;
use App\Services\booking\BookingServiceInterface;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private BookingServiceInterface $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;

    }

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

        $user = $this->bookingService->getUserBooked($booking);

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
        $isPaid = $this->bookingService->makeBookingPayment($booking);
        if (!$isPaid) {return back()->with('warning', 'Payment rejected!');}

        return back()->with('success', 'Payment accepted! :)');
    }


}

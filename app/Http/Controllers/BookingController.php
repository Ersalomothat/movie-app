<?php

namespace App\Http\Controllers;

use App\Enum\StatusBooking;
use App\Models\Booking;
use App\Models\Seat;
use App\Models\User;
use App\Services\booking\BookingService;
use App\Services\booking\BookingServiceInterface;
use App\Services\seat\SeatService;
use App\Services\seat\SeatServiceInterface;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private BookingService $bookingService;
    private SeatService $seatService;

    public function __construct(
        BookingServiceInterface $bookingService,
        SeatServiceInterface $seatService,
    ) {
        $this->bookingService = $bookingService;
        $this->seatService = $seatService;
    }

    public function cancelMovieBooking(Request $request, Booking $booking)
    {
        $total_price = $booking["total_price"];
        $user = User::find($booking->user_id);

        $booking->update([
            'status' => StatusBooking::CANCELED->value,
            'total_price' => 0
        ]);
        $user_balance = $user->balance()->first();
        $user_balance->update([
            'amount' => $user_balance["amount"] + $total_price
        ]);
        $this->seatService->changeAvailableSeat(explode(",", $booking["ids_seats"]));
        return back()->with('success', 'Booking canceled');
    }

    public function bookingAgain(Request $request, Booking $booking)
    {

        return back()->with('success', 'Booking again');
    }
    public function booking(Request $request, Booking $booking) {
        return back()->with('success', 'Booked');

    }
}

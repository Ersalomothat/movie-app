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
    private BookingServiceInterface $bookingService;
    public function __construct(BookingService $bookingService,) {
        $this->bookingService = $bookingService;
    }

    public function cancelMovieBooking(Request $request, $idBooking)
    {
        $booking = $this->bookingService->findOrFail($idBooking);
        $this->bookingService->cancelBooking($booking);
        return back()->with('success', 'Booking canceled');
    }

    public function bookingAgain(Request $request, int $idBooking)
    {
        $booking = $this->bookingService->findOrFail($idBooking);
        $isPaid = $this->bookingService->makeBookingPayment($booking);
        if(!$isPaid) return back()->with('warning', 'Your balance run out');

        return back()->with('success', 'Booking success');
    }
    public function booking(Request $request, Booking $booking) {

        return back()->with('success', 'Booked');

    }
}

<?php

namespace App\Services\booking;

use App\Models\Booking;
use App\Models\User;

interface BookingServiceInterface
{
    public function findOrFail(int $id): Booking;
    public function create(array $data): Booking;
    public function cancelBooking(Booking $booking);
    public function makeBookingPayment(Booking $booking):bool;
    public function getUserBooked(Booking $booking): User;
}

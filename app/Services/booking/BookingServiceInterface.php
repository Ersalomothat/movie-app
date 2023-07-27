<?php

namespace App\Services\booking;

interface BookingServiceInterface
{
    public function create(array $data);
    public function cancelBooking();
    public function bookingAgain();
}

<?php

namespace App\Repository;

use App\Models\Booking;

class BookingRepository
{
    private Booking $booking;

    public function __construct(Booking $booking) {
        $this->booking = $booking;
    }

    public function update() {
        return $this->booking->update([]);
    }
    public function create() {
        return $this->booking->create([]);
    }
}

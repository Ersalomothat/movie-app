<?php

namespace App\Repository;

use App\Models\Booking;
use App\Models\Seat;

class SeatRepository
{
    private Seat $seat;
    public function __construct(Seat $seat) {
        $this->seat = $seat;
    }

    public function changeAvailableSeat(array $ids, bool $to_true=true) {
        return $this->seat->whereIn('id', $ids)->update([
            'is_available' => $to_true
        ]);
    }
}

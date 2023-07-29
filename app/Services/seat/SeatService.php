<?php

namespace App\Services\seat;
use App\Models\Seat;
class SeatService implements SeatServiceInterface
{
    private Seat $seat;



    public function __construct(Seat $seat){
        $this->seat = $seat;
    }

    public function changeAvailableSeat(array $ids, $to_true=1):bool
    {
     return   $this->seat->whereIn('id', $ids)->update([
            'is_available' => $to_true
        ]);
    }
}

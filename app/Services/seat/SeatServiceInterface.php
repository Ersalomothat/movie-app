<?php

namespace App\Services\seat;


interface SeatServiceInterface
{
    public function changeAvailableSeat(array $ids, bool $to_true):bool;

}

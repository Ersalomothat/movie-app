<?php

namespace App\Services\seat;

use App\Repository\SeatRepository;

class SeatService implements SeatServiceInterface
{
    private SeatRepository $repository;


    public function __construct(SeatRepository $repository){
        $this->repository = $repository;
    }

    public function changeAvailableSeat(array $ids, bool $to_true=true)
    {
        $this->repository->changeAvailableSeat($ids, $to_true);
    }
}

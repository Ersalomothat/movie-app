<?php

namespace App\Services\booking;

use App\Repository\BookingRepository;

class BookingService implements BookingServiceInterface
{
    private BookingRepository $repository;

    public function __construct(BookingRepository $repository){
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        $this->repository->create($data);

    }

    public function cancelBooking()
    {
    }

    public function bookingAgain()
    {
    }
}

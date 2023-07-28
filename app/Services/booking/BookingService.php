<?php

namespace App\Services\booking;

use App\Enum\StatusBooking;
use App\Models\Booking;
use App\Models\User;
use App\Services\seat\SeatService;
use App\Services\user\UserService;

class BookingService implements BookingServiceInterface
{
    private Booking $booking;
    Private UserService $userService;
    Private SeatService $seatService;

    public function __construct(Booking $booking, UserService $user, SeatService $seat){
        $this->booking = $booking;
        $this->userService = $user;
        $this->seatService = $seat;
    }

    public function create(array $data):Booking
    {
        return $this->booking->create($data);
    }

    public function cancelBooking(Booking $booking):void
    {
        $total_price = $booking["total_price"];
        $user = $this->userService->findById($booking->user_id);
        $user_balance = $user->balance()->first();

        $booking->update(['status' => StatusBooking::CANCELED->value]);

        $user_balance->update([
            'amount' => $user_balance["amount"] + $total_price
        ]);
        $this->seatService->changeAvailableSeat(explode(",", $booking["ids_seats"]), 1);
    }


    public function findOrFail(int $id): Booking
    {
        return $this->booking->findOrFail($id);
    }

    public function makeBookingPayment(Booking $booking): bool
    {

        $user = $this->userService->findById($booking["user_id"]);
        $user_balance = $user['balance']['amount'];

        $restMoney = $user_balance - $booking["total_price"];

        if ( $user_balance < $booking['total_price'] or $restMoney < 0) {
            return false;
        }

        $user->balance()->update(['amount' => $restMoney]);

        $updated = $booking->update([
            'status' => StatusBooking::PAID->value
        ]);
        $this->seatService->changeAvailableSeat(explode(",", $booking["ids_seats"]), 1);
        return true;
    }

    public function getUserBooked(Booking $booking): User
    {
        return  $this->userService->findById($booking["user_id"]);
    }
}

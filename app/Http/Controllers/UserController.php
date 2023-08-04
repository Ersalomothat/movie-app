<?php

namespace App\Http\Controllers;

use App\Enum\StatusBooking;
use App\Models\Booking;
use App\Models\Seat;
use App\Services\seat\SeatService;
use App\Services\seat\SeatServiceInterface;
use App\Services\user\UserService;
use App\Services\user\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserServiceInterface $userService;
    private SeatServiceInterface $seatService;

    public function __construct(UserService $userService, SeatService $seatService)
    {
        $this->userService = $userService;
        $this->seatService = $seatService;

    }

    public function profile(Request $request)
    {
        return view('home.user.profile', [
            'title' => 'Profile'
        ]);
    }

    public function balance(Request $request)
    {
        return view('home.user.balance', [
            'title' => 'Balance'
        ]);
    }

    public function history(Request $request)
    {
        return view('home.user.history', [
            'title' => 'History',
            'histories' => Booking::whereUserId(auth()->id())->get()
        ]);
    }

    public function bookingMovie(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'birth_date' => 'required',
        ]);

        $password = '12345678';
        $data['password'] = $password;

        $movie = json_decode($request->input('movie'), true);

        $user = $this->userService->create($data);
        $logged = $this->userService->logIn($user["email"], $password);
        $age = get_age($user['birth_date']);

        if ($age < $movie['age_rating']) return to_route('home')->with('info', 'Your age does\'nt fit to this film');

        $seats_number = explode(',', $request->input('seat_number'));
        $total_price = count($seats_number) * $movie['ticket_price'];

        if ($logged) {
            $booking = $user->booking()->create([
                'showtime_id' => $request->input('showtime'),
                'ids_seats' => ($request->input('seat_number')),
                'booking_date' => now(),
                'total_price' => $total_price,
                'status' => StatusBooking::PENDING->value,
            ]);
            $this->seatService->changeAvailableSeat($seats_number,0);

            return to_route('home.payment.payment', $booking["id"])->with('success', 'Added to Booked payment');
        }
        return back()->with('error', 'FAIL');

    }

    public function topUp(Request $request)
    {
        $max_amount = '10000000';
        $request->validate([
            'amount' => 'required|numeric|max:' . $max_amount,
        ]);
        $user = auth()->user();
        $amount = $request->input('amount');
        $current_amount = $user->balance['amount'];

        $addingAmount = $current_amount + $amount;

        if ($addingAmount > intval($max_amount)) {
            return back()->with('success', 'Limit amount is ten million');
        }

        $user->balance()->update([
            'amount' => $addingAmount,
        ], [
            'amount.numeric' => 'number only :)',
            'amount.max' => 'Not more than 1 million'
        ]);

        return back()->with('success', 'Top up successfully :) 👍');
    }

}

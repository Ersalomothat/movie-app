<?php

namespace App\Http\Controllers;

use App\Enum\StatusBooking;
use App\Services\user\UserService;
use App\Services\user\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserServiceInterface $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

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
            'title' => 'History'
        ]);
    }

    public function bookingMovie(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'birth_Date' => 'required',
        ]);
        $password = '12345678';
        $data['password'] = $password;
        $current_url = $request->input('current_url');
        $movie = json_decode($request->input('movie'), true);

        $age = get_age($data['birth_Date']);
        if ($age < $movie['age_rating']) return redirect()
            ->to($current_url)->with('info', 'Your age does\'nt fit to this film');

        $total_price = count(explode(',',$request->input('seat_number'))) * $movie['ticket_price'];

        $user = $this->userService->create($data);



        $logged = \Auth::attempt([
            'email' => $user["email"],
            'password' => $password,
        ]);

        $booking = $user->booking()->create([
            'showtime_id' => $request->input('showtime'),
            'ids_seats' => ($request->input('seat_number')),
            'booking_date' => now(),
            'total_price' => $total_price,
            'status' => StatusBooking::PENDING->value,
        ]);
        return to_route('home.payment.payment', $booking["id"])->with('success','Booked');

    }
}

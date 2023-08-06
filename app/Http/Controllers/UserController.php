<?php

namespace App\Http\Controllers;

use App\Enum\StatusBooking;
use App\Models\Bill;
use App\Models\Booking;
use App\Models\Seat;
use App\Services\seat\SeatService;
use App\Services\seat\SeatServiceInterface;
use App\Services\user\UserService;
use App\Services\user\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

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
        $bills = Bill::whereUserId(auth()->id())->get();
        return view('home.user.balance', [
            'title' => 'Balance',
            'bills' => $bills,
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
            $this->seatService->changeAvailableSeat($seats_number, 0);

            return to_route('home.payment.payment', $booking["id"])->with('success', 'Added to Booked payment');
        }
        return back()->with('error', 'FAIL');

    }

    public function topUp(Request $request)
    {
        $max_amount = '10000000';
        $request->validate([
            'amount' => 'required|numeric|min:10000|max:' . $max_amount,
        ], [
            'amount.required' => 'input amount',
            'amount.numeric' => 'amount must be number',
            'amount.min'=> 'minimal amount Rp 10.000',
            'amount.max'=> 'maximal amount Rp 10.000.000',

        ]);
        $user = auth()->user();
        $amount = $request->amount;
        $external_id = Str::random(64);
        $response = Http::withHeaders([
            'Authorization' => config('xendit.xendit_auth')
        ])->post(config('xendit.invoice_url'), [
            'external_id' => $external_id,
            'amount' => $amount,
        ]);

        $response = $response->object();

        Bill::create([
            'user_id' => $user->id,
            'doc_no' => $external_id,
            'status' => $response->status,
            'amount' => $amount,
            'expiry_date' => $response->expiry_date,
            'invoice_url' => $response->invoice_url,
            'currency' => $response->currency,
            'bank' => 0
        ]);
        return back()->with('success', 'Top up successfully :) 👍');
    }

}

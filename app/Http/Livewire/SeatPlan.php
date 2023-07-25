<?php

namespace App\Http\Livewire;

use App\Enum\StatusBooking;
use App\Models\Booking;
use App\Models\Movie;
use App\Models\Seat;
use App\Models\Showtime;
use Livewire\Component;
use function Symfony\Component\String\u;

class SeatPlan extends Component
{
    public Movie $movie;
    public Showtime $showtime;

    public $id_seats = array();

    public $totalPrice = 0;

    public function mount(Showtime $showtime, Movie $movie): void
    {
        $this->movie = $movie;
        $this->showtime = $showtime;

        if (auth()->check()) {
            $booking = Booking::where('showtime_id', $showtime["id"])
                ->where('user_id', auth()->id())->first();

            $this->id_seats = array_values(
                array_filter(
                    explode(",", $booking["ids_seats"] ?? ""), function ($item) {
                    return $item !== null && $item !== '';
                }));
        }
        $numOfseat = request()->query('seat_number');
        if ($numOfseat) {
            $this->id_seats = explode(",", $numOfseat);
        }
        $this->totalPrice = $this->movie->ticket_price * count($this->id_seats);;

    }

    public function selectSeat($id)
    {

        if (count($this->id_seats) == 6) {
            return
                redirect()
                    ->route('home.movie.seat-plan', [
                        'showtime' => $this->showtime,
                        'movie' => $this->movie,
                        'seat_number' => $this->seatIdsToString()
                    ])
                    ->with('warning', 'Number of seats allow to take are six!');
        }
        $this->id_seats[] = $id;

        $this->totalPrice = $this->movie->ticket_price * count($this->id_seats);;
    }

    public function changeSeat($id)
    {
        foreach ($this->id_seats as $idx => $id_seat) {
            if ($id == $id_seat) {
                unset($this->id_seats[$idx]);
            }
        }
        $this->totalPrice -= $this->movie->ticket_price;

    }

    public function proceed()
    {
        if (($this->id_seats and $this->totalPrice > 0)) {
            // logged in user
            if (auth()->check()) {
                $seat_num = arrayToStr($this->id_seats);
                $user = auth()->user();
                $booking = Booking::where('user_id', $user["id"])->where('showtime_id',$this->showtime["id"])->first();
                $booking = $booking->updateOrCreate([
                    'user_id' => $user["id"],
                    'showtime_id' => $this->showtime["id"],
                ], [
                    'showtime_id' => $this->showtime["id"],
                    'ids_seats' => $seat_num,
                    'booking_date' => now(),
                    'total_price' => $this->totalPrice,
                    'status' => $booking->status == 'paid' ? StatusBooking::PAID->value : StatusBooking::PENDING->value,
                ]);

                Seat::whereIn('seat_number', explode(",", $seat_num))->update([
                    'is_available' => 0
                ]);

                return to_route('home.payment.payment', $booking["id"])->with('success', 'Added to Booked payment');

            }

            return to_route('home.movie.movie-checkout', [
                'showtime' => $this->showtime,
                'movie' => $this->movie["id"],
                'seat_number' => $this->seatIdsToString()
            ]);
        }
        return
            redirect()
                ->route('home.movie.seat-plan', [
                    'showtime' => $this->showtime,
                    'movie' => $this->movie
                ])
                ->with('warning', 'You must select at least one seat');

    }

    public function seatIdsToString(): string
    {
        return arrayToStr($this->id_seats);
    }


    public
    function render()
    {
        $seats = $this->divideSeatsIntoSections();
        return view('livewire.seat-plan', [
            'seats' => $this->divideSeatsIntoSections(),
        ]);

    }

    private
    function divideSeatsIntoSections(): array
    {
        $all_seats = Seat::get(['id', 'is_available']);
        $seats = [];
        $devOfSeats = 16;
        $counter = 0;
        foreach (range(1, 4) as $idx) {
            $arrOfSeats = array();
            for ($i = 0; $i < $devOfSeats; $i++) {
                if ($counter >= count($all_seats)) break;
                $arrOfSeats[] = $all_seats[$counter];
                $counter += 1;
            }
            $seats[$idx] = $arrOfSeats;
        }
        return $seats;
    }
}

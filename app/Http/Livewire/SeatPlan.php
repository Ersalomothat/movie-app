<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use App\Models\Seat;
use Livewire\Component;

class SeatPlan extends Component
{
    public Movie $movie;

    public $id_seats = array();

    public $totalPrice = 0;

    public function mount(Movie $movie): void
    {
        $this->movie = $movie;

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
                    ->route('home.movie.movie-detail.seat-plan', [
                        'movie' => $this->movie,
                        'seat_number' => $this->seatIdsToString()
                    ])
                    ->with('warning','Number of seats allow to take are six!');
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
            return to_route('home.movie.movie-checkout', [
                'movie' => $this->movie["id"],
                'seat_number' => $this->seatIdsToString()
            ]);
        }
        return
            redirect()
            ->route('home.movie.movie-detail.seat-plan', $this->movie)
                ->with('warning','You must select at least one seat');

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

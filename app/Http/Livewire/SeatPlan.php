<?php

namespace App\Http\Livewire;

use App\Enum\StatusBooking;
use App\Models\Booking;
use App\Models\Movie;
use App\Models\Seat;
use App\Models\Showtime;
use Illuminate\Http\RedirectResponse;
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
            $booking = Booking::whereUserId(auth()->id())->whereShowtimeId($showtime["id"])->first();

            $this->id_seats = array_values(
                array_filter(
                    explode(",", $booking["ids_seats"] ?? ""), function ($item) {
                    return $item !== null && $item !== '';
                }));
        }
        if ($seat_number = request()->query('seat_number')) {
            $this->id_seats = explode(",", $seat_number);
        }

        $this->setTotalPrice($this->movie->ticket_price, count($this->id_seats));

    }

    public function selectSeat($id)
    {

        if (count($this->id_seats) >= 6) {
            return
                redirect()->route('home.movie.seat-plan', $this->argsRoute())
                    ->with('warning', 'Number of seats allow to take are six!');
        }

        if (!in_array($id, $this->id_seats)) {
            $this->id_seats[] = $id;
            $this->setTotalPrice($this->movie->ticket_price, count($this->id_seats));
        }
    }


    public function setTotalPrice($price, $count): void
    {
        $this->totalPrice = $price * $count;
    }

    public function changeSeat($id): void

    {
        $idx = array_search($id, $this->id_seats);
        if ($idx !== false) { // idx = false do nothing
            unset($this->id_seats[$idx]);
            $this->totalPrice -= $this->movie->ticket_price;
        }
    }

    public function proceed()
    {
        $hasSelectedSeats = !empty($this->id_seats) && $this->totalPrice > 0;

        if ($hasSelectedSeats) {
            if (auth()->check()) { return $this->proceedLoginUser();}

            return to_route('home.movie.movie-checkout', $this->argsRoute());
        }
        return
            to_route('home.movie.seat-plan', $this->argsRoute())
                ->with('warning', 'You must select at least one seat');

    }

    private function proceedLoginUser()
    {
        $user = auth()->user();
        $booking = Booking::where('user_id', $user["id"])->where('showtime_id', $this->showtime["id"])->first();
        $bookingData = [
            'showtime_id' => $this->showtime["id"],
            'ids_seats' => arrayToStr($this->id_seats),
            'booking_date' => now(),
            'total_price' => $this->totalPrice,
            'status' => $booking && $booking->status == 'paid' ? StatusBooking::PAID->value : StatusBooking::PENDING->value,
        ];

        if ($booking) {
            $booking->update($bookingData);
        } else {
            $booking = $user->booking()->create($bookingData);
        }
        Seat::whereIn('seat_number', explode(",", $bookingData["ids_seats"]))->update([
            'is_available' => 0
        ]);
        return redirect()->route('home.payment.payment', $booking["id"])->with('success', 'Added to Booked payment');
    }

    public function seatIdsToString(): string
    {
        return arrayToStr($this->id_seats);
    }


    public function render()
    {
        $seats = $this->divideSeatsIntoSections();
        return view('livewire.seat-plan', [
            'seats' => $seats,
        ]);

    }

    private function argsRoute() {
        $args = [
            'showtime' => $this->showtime,
            'movie' => $this->movie["id"],
            'seat_number' => $this->seatIdsToString()
        ];

        return $args;
    }

    private
    function divideSeatsIntoSections(): array
    {
        $all_seats = 64;
        $seats = [];
        $devOfSeats = 16;
        $counter = 1;
        foreach (range(1, 4) as $idx) {
            $arrOfSeats = array();
            for ($i = 0; $i < $devOfSeats; $i++) {
                if ($counter > $all_seats) break;
                $seat = [
                    'id' => $counter  ,
                    'is_available' => in_array($counter, getBookedSeats($this->showtime['id'])) ? 0 : 1,
                ];
                $arrOfSeats[] = $seat;
                $counter += 1;
            }
            $seats[$idx] = $arrOfSeats;
        }
        return $seats;
    }
}

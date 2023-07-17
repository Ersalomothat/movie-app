<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function movieDetail(Request $request,Movie $movie) {
        $showtimes = Showtime::whereMovieId($movie['id'])->get();
        return view('home.movie.movie-detail', [
            'movie' => $movie,
            'show_times'=>$showtimes

        ]);
    }
    public function movieSeatPlan(Request $request, Movie $movie) {

        return view('home.movie.movie-seat-plan', []);
    }
    public function movieCheckout(Request $request, Movie $movie) {
        return view('home.movie.movie-checkout', []);

    }

}

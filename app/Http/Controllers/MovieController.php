<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function movieDetail(Request $request, Movie $movie)
    {

        $showtimes = Showtime::whereMovieId($movie['id'])->get();
        return view('home.movie.movie-detail', [
            'movie' => $movie,
            'show_times' => $showtimes

        ]);
    }

    public function movieSeatPlan(Request $request, Showtime $showtime, Movie $movie)
    {
        /**
         * for logged user
         */
        if (auth()->check() && get_age(auth()->user()["birth_date"]) < $movie["age_rating"]) {
            return back()->with('warning', 'your age doesnt fit to this movie');

        }
        return view('home.movie.movie-seat-plan', [
            'showtime' => $showtime,
            'movie' => $movie,
        ]);
    }

    public function movieCheckout(Request $request, Showtime $showtime, Movie $movie)
    {

        return view('home.movie.movie-checkout', [
            'showtime' => $showtime,
            'movie' => $movie
        ]);

    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function movieDetail(Request $request,Movie $movie) {
        return view('home.movie.movie-detail', [
            'movie' => $movie
        ]);
    }
    public function movieSeatPlan(Request $request, Movie $movie) {

        return view('home.movie.movie-seat-plan', []);
    }
    public function movieCheckout(Request $request, Movie $movie) {
        return view('home.movie.movie-checkout', []);

    }

}

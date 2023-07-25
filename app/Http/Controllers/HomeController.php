<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $movies = Movie::query();

        if ($q = $request->query("q")) $movies->search($q);

        return view('home.index', [
            'movies' => $movies->paginate(20),
            'q' => $q
        ]);
    }
}

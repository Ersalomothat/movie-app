<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use DeepCopy\Filter\ChainableFilter;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {

        $q = $request->query("q", "");
        $movies = Movie::search($q);
        return view('home.index', [
            'movies' => $movies->paginate(20),
            'q' => $q
        ]);

    }
}

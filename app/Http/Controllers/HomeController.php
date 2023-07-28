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

        $q = $request->query("q","");

        $movies = Cache::remember("movies_query_" . $q, 36000, function () use ($q) {
            $movies = Movie::query();
            if ($q) $movies->search($q);

            return $movies->paginate(20);
        });
        return view('home.index', [
            'movies' => $movies,
            'q' => $q
        ]);
    }
}

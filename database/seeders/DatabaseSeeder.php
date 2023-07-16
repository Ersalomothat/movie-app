<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Seat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Movie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $movie = Movie::first();
        if (!$movie) {
            $url = "https://seleksi-sea-2023.vercel.app/api/movies";
            $res = Http::get($url);
            if ($res->ok()) {
                $movies = $res->json();
                foreach ($movies as $movie) {
                    unset($movie["id"]);
                    Movie::create($movie);
                }
            }
        }
        if (!Seat::first()) {
            foreach (range(1, 64) as $i) {
                Seat::create([
                    'seat_number' => $i,
                    'is_available' => random_int(0, 1)
                ]);
            }
        }
    }
}

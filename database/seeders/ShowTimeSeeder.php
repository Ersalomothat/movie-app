<?php

namespace Database\Seeders;

use App\Models\Showtime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShowTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfMovies = 31;
        $numberOfShowtimesPerMovie = 3;
        $availableTheaterIds = range(1, 10);
        $oneWeekInSeconds = 7 * 24 * 60 * 60; // 1 week in seconds
        $currentTime = time(); // Current timestamp

        for ($movieId = 1; $movieId <= $numberOfMovies; $movieId++) {
            $theaterId = $availableTheaterIds[array_rand($availableTheaterIds)];

            for ($i = 0; $i < $numberOfShowtimesPerMovie; $i++) {
                // Generate a random timestamp within the range of 1 week (7 days) from the current date
                $randomTimestamp = mt_rand($currentTime, $currentTime + $oneWeekInSeconds);
                $showtimeDate = date('Y-m-d', $randomTimestamp);

                // Generate a random time for morning, afternoon, and evening showtimes
                if ($i === 0) {
                    $startTime = strtotime('9:00 AM');
                    $endTime = strtotime('11:59 AM');
                } elseif ($i === 1) {
                    $startTime = strtotime('12:00 PM');
                    $endTime = strtotime('4:59 PM');
                } else {
                    $startTime = strtotime('5:00 PM');
                    $endTime = strtotime('10:59 PM');
                }

                $randomTimestamp = mt_rand($startTime, $endTime);
                $showtimeTime = date('H:i:s', $randomTimestamp);

                // Combine date and time into the dateTime format
                $showtimeDateTime = $showtimeDate . ' ' . $showtimeTime;

                $randomData = [
                    'movie_id' => (int)$movieId,
                    'theater_id' => (int)$theaterId,
                    'showtime_date' => $showtimeDateTime,
                ];
                Showtime::create($randomData);
            }
        }

    }
}

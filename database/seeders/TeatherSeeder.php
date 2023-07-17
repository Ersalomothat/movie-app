<?php

namespace Database\Seeders;

use App\Models\Teather;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $dummyData = [
            [
                'theater_name' => 'Mega Cineplex',
                'theater_location' => 'Jakarta, Indo',
                'seat_capacity' => 64,
            ],
            [
                'theater_name' => 'Golden Plaza Cinemas',
                'theater_location' => 'Surabaya, Indo',
                'seat_capacity' => 64,
            ],
            [
                'theater_name' => 'Paramount Theaters',
                'theater_location' => 'Bandung, Indo',
                'seat_capacity' => 64,
            ],
            [
                'theater_name' => 'Harmony Multiplex',
                'theater_location' => 'Medan, Indo',
                'seat_capacity' => 64,
            ],
            [
                'theater_name' => 'Central Cinemas',
                'theater_location' => 'Semarang, Indo',
                'seat_capacity' => 64,
            ],
            [
                'theater_name' => 'Grand Premiere',
                'theater_location' => 'Makassar, Indo',
                'seat_capacity' => 64,
            ],
            [
                'theater_name' => 'Liberty Theaters',
                'theater_location' => 'Palembang, Indo',
                'seat_capacity' => 64,
            ],
            [
                'theater_name' => 'Platinum Cineplex',
                'theater_location' => 'Bekasi, Indo',
                'seat_capacity' => 64,
            ],
            [
                'theater_name' => 'Royal Cinemas',
                'theater_location' => 'Tangerang, Indo',
                'seat_capacity' => 64,
            ],
            [
                'theater_name' => 'Galaxy Multiplex',
                'theater_location' => 'Depok, Indo',
                'seat_capacity' => 64,
            ],
        ];
        foreach ($dummyData as $teather) {
            Teather::create($teather);
        }
    }
}

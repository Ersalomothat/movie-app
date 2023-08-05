<?php

if (!function_exists('get_age')) {
    function get_age($birthOfdate): int
    {
        $now = new \DateTime();
        $birthDate = new \DateTime($birthOfdate);
        return $now->diff($birthDate)->y;
    }
}

if (!function_exists('arrayToStr')) {
    function arrayToStr(array $arr): string
    {
        return implode(',', $arr);
    }
}

if (!function_exists('getBookedSeats')) {
    function getBookedSeats($shoetimeId): array
    {
        $booked_seats = \App\Models\Booking::whereShowtimeId($shoetimeId)->pluck('ids_seats');
        $booking_seats = [];
        foreach ($booked_seats as $seats) {
            $seats = explode(',', $seats);
            foreach ($seats as $seat) {
                $booking_seats[] = $seat;
            }
        }
        return array_unique($booking_seats);
    }
}

<x-app-layout title="Movie Seat Plan">
    <div class="seat-plan-section padding-bottom padding-top">
    @php
    $showtime = request()->showtime;
        $movie = request()->movie;

    @endphp
    <livewire:seat-plan :showtime="$showtime" :movie="$movie"/>
    </div>
</x-app-layout>

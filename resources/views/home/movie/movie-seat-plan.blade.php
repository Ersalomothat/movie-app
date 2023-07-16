<x-app-layout title="Movie Seat Plan">
    <div class="seat-plan-section padding-bottom padding-top">
    @php
        $movie = request()->movie;
    @endphp
    <livewire:seat-plan :movie="$movie"/>
    </div>
</x-app-layout>

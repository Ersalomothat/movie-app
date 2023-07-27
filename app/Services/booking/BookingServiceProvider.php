<?php

namespace App\Services\booking;

use Illuminate\Support\ServiceProvider;

class BookingServiceProvider extends ServiceProvider
{
    public function register():void
    {
        $this->app->bind(
            BookingServiceInterface::class,
            BookingService::class
        );
    }
}

<?php

namespace App\Services\seat;

use Illuminate\Support\ServiceProvider;

class SeatServiceProvider extends ServiceProvider
{
    public function register():void
    {
        $this->app->bind(SeatServiceInterface::class,SeatService::class);
    }
}

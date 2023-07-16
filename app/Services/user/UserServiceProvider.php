<?php

namespace App\Services\user;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UserServiceInterface::class,
            UserService::class
        );
    }

}

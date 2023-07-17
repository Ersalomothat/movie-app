<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', fn() => to_route('home'));
Route::get('home', HomeController::class)->name('home');


Route::group([
    'prefix' => 'auth',
    'as' => 'auth.'
], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::view('sign-in', 'auth.sign-in')->name('sign-in');
        Route::post('sign-in', 'signIn');
        Route::view('sign-up', 'auth.sign-up')->name('sign-up');
        Route::post('sign-up', 'signUp');
    });
});

Route::group([
    'prefix' => 'movie-app',
    'as' => 'home.'
], function () {
    Route::delete('logout', [AuthController::class, 'logout'])->name('logout');

    Route::controller(MovieController::class)
        ->prefix('')
        ->as('movie.')
        ->group(function () {
            Route::get('movie/{movie}/detail', 'movieDetail')->name('detail-movie');
            Route::get('movie-detail/{movie}/seat-plan', 'movieSeatPlan')->name('movie-detail.seat-plan');
            Route::get('movie-detail/{movie}/checkout', 'movieCheckout')->name('movie-checkout');
        });

    Route::controller(UserController::class)
        ->prefix('user')
        ->as('user.')
        ->group(function () {
            Route::get('profile', 'profile')->name('profile');
            Route::get('balance', 'balance')->name('balance');
            Route::get('history', 'history')->name('history');
            Route::post('booking-movie','bookingMovie')->name('booking-movie');
        });

    Route::controller(\App\Http\Controllers\PaymentController::class)
        ->prefix('payment')
        ->as('payment.')
        ->group(function (){
            Route::get('booking/payment', 'payment')->name('payment');
//            Route::get('{booking}/payment', 'payment')->name('payment');


    });
});

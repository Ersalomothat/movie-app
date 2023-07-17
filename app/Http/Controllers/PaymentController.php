<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment(Request $request, Booking $booking){
        return view('home.payment.payment');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'showtime_id', 'user_id', 'ids_seats', 'booking_date','total_price','status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function showtime() {
        return $this->belongsTo(Showtime::class, 'showtime_id');

    }
}

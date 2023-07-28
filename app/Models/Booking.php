<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'showtime_id', 'user_id', 'ids_seats', 'booking_date','total_price','status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function showtime():BelongsTo {
        return $this->belongsTo(Showtime::class, 'showtime_id');

    }
}

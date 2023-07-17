<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;

    protected $with = [
        'teather'
    ];

    protected $fillable = [
        'movie_id', 'theater_id', 'showtime_date',
    ];

    public function teather() {
        return $this->belongsTo(Teather::class, 'theater_id');
    }
}

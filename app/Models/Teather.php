<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teather extends Model
{
    use HasFactory;
    protected $table = 'theaters';
    protected $fillable = [
        'theater_name',
        'theater_location',
        'seat_capacity'
    ];
}

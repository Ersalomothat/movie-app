<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
//    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'age_rating',
        'release_date',
        'poster_url',
        'ticket_price',
    ];

    public function scopeSearch(Builder $query, $term): Builder
    {
        $term = "%$term%";
        return $query->where(function ($q) use ($term) {
            $q->where('title', 'like', $term);
        });
    }

}

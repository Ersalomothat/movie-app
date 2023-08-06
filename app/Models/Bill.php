<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
//    use HasFactory;

    protected $fillable = [
        'doc_no',
        'user_id',
        'status',
        'amount',
        'expiry_date',
        'invoice_url',
        'currency',
        'bank'
    ];


}

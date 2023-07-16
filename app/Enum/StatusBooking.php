<?php

namespace App\Enum;

enum StatusBooking: string
{
    case PAID = 'paid';
    case PENDING = 'pending';
    case CANCELED = 'canceled';

}

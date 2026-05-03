<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

#[Fillable([
    'bookable_id',
    'bookable_type',
    'user_id',
    'flight_school_id',
    'booking_date',
    'booking_time_out',
    'booking_time_in',
])]
class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    // polymorphic relationship with a bookable model
    public function bookable(): MorphTo
    {
        return $this->morphTo();
    }
}

<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\AircraftFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\BookableContract;
use Illuminate\Database\Eloquent\Relations\MorphMany;

#[Fillable([
    'type',
    'make',
    'model',
    'description',
    'registration',
    'rental_price_per_hour',
    'fuel_type_id',
    'flight_school_id',
    'in_service',
    'current_hours',
])]
class Aircraft extends Model implements BookableContract
{
    /** @use HasFactory<AircraftFactory> */
    use HasFactory;


    public function bookings(): MorphMany
    {
        return $this->morphMany(Booking::class, 'bookable');
    }
}

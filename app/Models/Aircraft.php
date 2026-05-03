<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\BookableContract;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Builder;
use Database\Factories\AircraftFactory;

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


    // aircraft has many bookings
    public function bookings(): MorphMany
    {
        return $this->morphMany(Booking::class, 'bookable');
    }

    public function engineType(): BelongsTo
    {
        return $this->belongsTo(EngineType::class, 'engine_type_id');
    }

    // aircraft belongs to a flight school
    public function flightSchool(): BelongsTo
    {
        return $this->belongsTo(FlightSchool::class, 'flight_school_id');
    }

    // scope to check if the aircraft has a booking outside of a prebooked date time slots
    public function scopeAircraftAvailable(Builder $query): Builder
    {
        return $query->where('in_service', true)->whereDoesntHave('bookings', function (Builder $bookingQuery) {
            $bookingQuery->where('booking_date_time_out', '>=', now())
                ->where('booking_date_time_in', '<=', now());
        });
    }
}

<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\BookableContract;
use Database\Factories\AircraftFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    protected $casts = [
        'in_service' => 'boolean',
    ];

    /**
     * Aircraft has many bookings
     */
    public function bookings(): MorphMany
    {
        return $this->morphMany(Booking::class, 'bookable');
    }

    /**
     * Aircraft has an engine type
     */
    public function engineType(): BelongsTo
    {
        return $this->belongsTo(EngineType::class, 'engine_type_id');
    }

    /**
     * Aircraft belongs to a flight school
     */
    public function flightSchool(): BelongsTo
    {
        return $this->belongsTo(FlightSchool::class, 'flight_school_id');
    }

    /**
     * Query scope for checking if the aircraft is serviceable
     */
    public function scopeAircraftServiceable(Builder $query): Builder
    {
        return $query->where('in_service', true);
    }

    /**
     * Check if the aircraft is serviceable
     */
    public function isServiceable(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->attributes['in_service'] === 1,
        );
    }
}

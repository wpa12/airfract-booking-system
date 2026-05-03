<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\BookingFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

#[Fillable([
    'bookable_id',
    'bookable_type',
    'user_id',
    'flight_school_id',
    'booking_date_time_start',
    'booking_date_time_end',
    'booking_status',
    'created_at',
    'updated_at',
])]
class Booking extends Model
{
    /** @use HasFactory<BookingFactory> */
    use HasFactory;

    /**
     * Polymorphic relationship with a bookable model (Aircraft etc...)
     */
    public function bookable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Booking the user belongs to
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Flight school the booking belongs to
     */
    public function flightSchool(): BelongsTo
    {
        return $this->belongsTo(FlightSchool::class, 'flight_school_id');
    }

    /**
     * Check if a booking overlaps with an existing booking
     */
    public function scopeOverlappingBookings(Builder $query, Carbon $bookingDateTimeStart, Carbon $bookingDateTimeEnd): Builder
    {
        return $query->where('booking_date_time_start', '<=', $bookingDateTimeEnd)
            ->where('booking_date_time_end', '>=', $bookingDateTimeStart);
    }
}

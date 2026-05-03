<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

#[Fillable([
    'bookable_id',
    'bookable_type',
    'user_id',
    'flight_school_id',
    'booking_date_time_out',
    'booking_date_time_in',
    'booking_status',
    'created_at',
    'updated_at',
])]
class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    /**
     * Polymorphic relationship with a bookable model (Aircraft etc...)
     *
     * @return MorphTo
     */
    public function bookable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Booking the user belongs to
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Flight school the booking belongs to
     *
     * @return BelongsTo
     */
    public function flightSchool(): BelongsTo
    {
        return $this->belongsTo(FlightSchool::class, 'flight_school_id');
    }

    /**
     * Check if a booking overlaps with an existing booking
     *
     * @param Builder $query
     * @param Carbon $bookingDateTimeOut
     * @param Carbon $bookingDateTimeIn
     * @return Builder
     */
    public function scopeOverlappingBookings(Builder $query, Carbon $bookingDateTimeOut, Carbon $bookingDateTimeIn): Builder
    {
        return $query->where('booking_date_time_out', '<=', $bookingDateTimeIn)
            ->where('booking_date_time_in', '>=', $bookingDateTimeOut);
    }
}

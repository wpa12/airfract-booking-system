<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Abstracts\BaseRepository;
use App\Contracts\BookableContract;
use App\Exceptions\BookingException;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

/* This booking Repository extends the abstract repository, the provider then injects the booking model into the repoository so that the repository can be used in the service */
class BookingRepository extends BaseRepository
{
    /**
     * Finds all records in the database and paginate them
     */
    public function findAllBookings(): LengthAwarePaginator
    {
        return $this->model->orderBy('created_at', 'desc')->paginate(50);
    }

    /**
     * Paginated bookings for a user, with bookable loaded for display.
     */
    public function findBookingsForUser(int $userId, int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->newQuery()
            ->where('user_id', $userId)
            ->with('bookable')
            ->orderByDesc('booking_date_time_start')
            ->paginate($perPage);
    }

    /**
     * Creates a new booking and checks if it overlaps with an existing booking
     *
     * @throws BookingException if the booking overlaps with an existing booking
     */
    public function createBooking(BookableContract $bookable, array $data): Booking
    {
        if ($this->checkIfBookingsOverlap($bookable, $data['booking_date_time_start'], $data['booking_date_time_end'])) {
            throw new BookingException('Booking overlaps with an existing booking', 400);
        }

        return $this->model->create($data);
    }

    /**
     * Update an existing booking and check if it overlaps with an existing booking time
     *
     * @throws BookingException if the booking overlaps with an existing booking
     */
    public function updateBooking(Booking $booking, array $data): Booking
    {
        $booking->update($data);

        return $booking->refresh();
    }

    /**
     * check if a requested booking overlaps with an exsiting booking
     */
    private function checkIfBookingsOverlap(BookableContract $bookable, Carbon $bookingDateTimeStart, Carbon $bookingDateTimeEnd): bool
    {
        // the resolved bookable model will have a bookings relationship, so we can use the scope to check if the booking overlaps with an existing booking here.
        return $bookable->bookings()->overlappingBookings($bookingDateTimeStart, $bookingDateTimeEnd)->exists();
    }
}

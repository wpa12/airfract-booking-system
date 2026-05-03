<?php

namespace App\Services;

use App\Models\Booking;
use App\Repositories\BookingRepository;
use App\Support\BookableResolver;
use Illuminate\Pagination\LengthAwarePaginator;

// Booking service which uses constructor promotion to inject the booking repository
class BookingService
{
    public function __construct(
        private readonly BookingRepository $bookingRepository,
    ) {}

    /**
     * Finds all bookings from the database
     */
    public function findAll(): LengthAwarePaginator
    {
        return $this->bookingRepository->findAllBookings();
    }

    public function findForUser(int $userId, int $perPage = 15): LengthAwarePaginator
    {
        return $this->bookingRepository->findBookingsForUser($userId, $perPage);
    }

    /**
     * Creates a new booking
     */
    public function createBooking(string $bookableType, array $data): Booking
    {
        // this will either resolve to a bookable model or throw a booking exception
        $bookableModel = BookableResolver::resolve($bookableType);

        return $this->bookingRepository->createBooking($bookableModel, $data);
    }

    /**
     * Updates a booking
     */
    public function updateBooking(Booking $booking, array $data): Booking
    {
        // this will either resolve to a bookable model or throw a booking exception

        return $this->bookingRepository->updateBooking($booking, $data);
    }

    /**
     * Deletes a booking
     */
    public function deleteBooking(int $id): bool
    {
        return $this->bookingRepository->delete($id);
    }
}

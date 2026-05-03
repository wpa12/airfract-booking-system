<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Services\BookingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BookingController extends Controller
{
    public function __construct(private readonly BookingService $bookingService) {}

    /**
     * Gets all bookings
     */
    public function index(Request $request): View
    {
        $bookings = $this->bookingService->findForUser((int) $request->user()->id);

        return view('dashboard.bookings.index', compact('bookings'));
    }

    /**
     * Gets a booking by its id
     */
    public function getBooking(Booking $booking): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Booking fetched successfully',
            'data' => $booking,
        ], 200);
    }

    /**
     * Creates a new booking
     */
    public function createBooking(string $bookableType, CreateBookingRequest $request): RedirectResponse
    {
        $booking = $this->bookingService->createBooking($bookableType, $request->validated());

        return redirect()->route('dashboard.bookings.index')->with('success', 'Booking created successfully');
    }

    /**
     * Updates a booking
     */
    public function updateBooking(Booking $booking, UpdateBookingRequest $request): RedirectResponse
    {
        $this->bookingService->updateBooking($booking, $request->validated());

        return redirect()->route('dashboard.bookings.index')->with('success', 'Booking updated successfully');
    }
}

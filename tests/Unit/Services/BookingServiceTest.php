<?php

namespace Tests\Unit\Services;

use App\Models\Aircraft;
use App\Models\Booking;
use App\Repositories\BookingRepository;
use App\Services\BookingService;
use Illuminate\Pagination\LengthAwarePaginator;
use Mockery;
use Tests\TestCase;

class BookingServiceTest extends TestCase
{
    private BookingService $bookingService;

    private BookingRepository $mockBookingRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockBookingRepository = Mockery::mock(BookingRepository::class);
        $this->bookingService = new BookingService($this->mockBookingRepository);
    }

    public function test_create_booking()
    {
        // Arrange
        $aircraft = new Aircraft([
            'id' => 1,
            'type' => 'single',
            'make' => 'Cessna',
            'model' => '172',
            'description' => 'Cessna 172',
            'registration' => 'N12345',
            'rental_price_per_hour' => 100,
            'engine_type_id' => 1,
            'flight_school_id' => 1,
        ]);

        $data = [
            'bookable_id' => $aircraft->id,
            'bookable_type' => $aircraft->getMorphClass(),
            'user_id' => 1,
            'flight_school_id' => 1,
            'booking_date_time_start' => '2026-01-01 10:00:00',
            'booking_date_time_end' => '2026-01-01 11:00:00',
        ];

        // Act
        $this->mockBookingRepository
            ->shouldReceive('createBooking')
            ->once()
            ->with($aircraft, $data)
            ->andReturn(new Booking);

        $booking = $this->bookingService->createBooking($aircraft, $data);

        // Assert
        $this->assertInstanceOf(Booking::class, $booking);
    }

    public function test_update_booking(): void
    {
        $data = [
            'id' => 1,
            'bookable_id' => 1,
            'bookable_type' => 'App\Models\Aircraft',
            'user_id' => 1,
            'flight_school_id' => 1,
            'booking_date_time_start' => '2026-01-01 10:00:00',
            'booking_date_time_end' => '11:00:00',
        ];

        $this->mockBookingRepository
            ->shouldReceive('update')
            ->once()
            ->with($data)
            ->andReturn(new Booking);

        $booking = $this->bookingService->updateBooking($data);

        $this->assertInstanceOf(Booking::class, $booking);
    }

    public function test_delete_booking(): void
    {
        $this->mockBookingRepository
            ->shouldReceive('delete')
            ->once()
            ->with(1)
            ->andReturn(true);

        $result = $this->bookingService->deleteBooking(1);

        $this->assertTrue($result);
    }

    public function test_find_all_bookings(): void
    {
        $bookings = [new Booking([
            'bookable_id' => 1,
            'bookable_type' => 'App\Models\Aircraft',
            'user_id' => 1,
            'flight_school_id' => 1,
            'booking_date' => '2026-01-01',
            'booking_time_out' => '10:00:00',
            'booking_time_in' => '11:00:00',
        ]), new Booking([
            'bookable_id' => 2,
            'bookable_type' => 'App\Models\Aircraft',
            'user_id' => 2,
            'flight_school_id' => 2,
            'booking_date' => '2026-01-02',
            'booking_time_out' => '10:00:00',
            'booking_time_in' => '11:00:00',
        ])];

        $paginator = $this->paginator($bookings, 2);

        $this->mockBookingRepository
            ->shouldReceive('findAllBookings')
            ->once()
            ->andReturn($paginator);

        $bookings = $this->bookingService->findAll();

        $this->assertEquals($paginator->items(), $bookings->items());
        $this->assertInstanceOf(LengthAwarePaginator::class, $bookings);
    }

    /**
     * helper to create a paginator for testing
     */
    private function paginator(array $items, int $total): LengthAwarePaginator
    {
        return new LengthAwarePaginator($items, $total, 10);
    }
}

<?php

namespace Database\Seeders;

use App\Enums\BookingStatuses;
use App\Models\Booking;
use App\Models\FlightSchool;
use App\Models\User;
use Carbon\Carbon;
use Database\Factories\BookingFactory;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (BookingFactory::bookableTypes() as $bookableType) {
            Booking::factory()
                ->count(10)
                ->make()
                ->each(function ($booking) use ($bookableType) {
                    $times = BookingFactory::generateBookingTimes();
                    $booking->bookable_id = $bookableType::factory()->create()->id;
                    $booking->bookable_type = $bookableType;
                    $booking->user_id = User::query()->pluck('id')->random();
                    $booking->flight_school_id = FlightSchool::query()->pluck('id')->random();
                    $booking->booking_date_time_start = $times['booking_date_time_start'];
                    $booking->booking_date_time_end = $times['booking_date_time_end'];
                    $booking->booking_status = $times['booking_date_time_start'] < Carbon::now() ? BookingStatuses::PENDING->value : BookingStatuses::CONFIRMED->value;
                    $booking->save();
                });
        }

    }
}

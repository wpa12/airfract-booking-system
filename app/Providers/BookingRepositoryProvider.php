<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Booking;
use App\Repositories\BookingRepository;
use Illuminate\Support\ServiceProvider;

class BookingRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // bind the booking repository to the container injecting booking model
        $this->app->bindIf(BookingRepository::class, function ($app) {
            return new BookingRepository($app->make(Booking::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

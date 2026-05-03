<?php

namespace App\Providers;

use App\Repositories\BookingRepository;
use App\Services\BookingService;
use Illuminate\Support\ServiceProvider;

class BookingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // bind the booking service to the container with booking repository DI'd
        $this->app->bindIf(BookingService::class, function ($app) {
            return new BookingService($app->make(BookingRepository::class));
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

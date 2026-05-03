<?php

use App\Providers\AppServiceProvider;
use App\Providers\BookingRepositoryProvider;
use App\Providers\BookingServiceProvider;

return [
    AppServiceProvider::class,
    BookingRepositoryProvider::class,
    BookingServiceProvider::class,
];

<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

// contract for a bookable model
interface BookableContract
{
    public function bookings(): MorphMany;
}

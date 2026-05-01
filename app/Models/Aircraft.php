<?php

namespace App\Models;

use Database\Factories\AircraftFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'type',
    'make',
    'model',
    'description',
    'registration',
    'rental_price_per_hour',
    'fuel_type_id',
    'flight_school_id',
    'in_service',
    'current_hours',
])]
class Aircraft extends Model
{
    /** @use HasFactory<AircraftFactory> */
    use HasFactory;
}

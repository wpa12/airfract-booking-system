<?php

namespace App\Models;

use Database\Factories\AirportFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name',
    'icao_code',
    'address_id',
    'avgas_price_per_litre',
    'jetA1_price_per_litre',
    'landing_fee',
])]
class Airport extends Model
{
    /** @use HasFactory<AirportFactory> */
    use HasFactory;
}

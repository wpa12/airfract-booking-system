<?php

namespace App\Models;

use Database\Factories\AirportsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airports extends Model
{
    /** @use HasFactory<AirportsFactory> */
    use HasFactory;
}

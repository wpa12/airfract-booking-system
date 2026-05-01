<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EngineType extends Model
{
    /** @use HasFactory<\Database\Factories\EngineTypeFactory> */
    use HasFactory;

    protected $fillable = [
        'type',
        'description',
        'fuel_type_id',
    ];
}

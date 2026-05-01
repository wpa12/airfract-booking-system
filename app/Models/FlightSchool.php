<?php

namespace App\Models;

use Database\Factories\FlightSchoolFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['name', 'description', 'address_id', 'created_at', 'updated_at'])]
class FlightSchool extends Model
{
    /** @use HasFactory<FlightSchoolFactory> */
    use HasFactory;

    /**
     * Get the address for the flight school
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    /**
     * Get the aircraft for the flight school
     */
    public function aircraft(): HasMany
    {
        return $this->hasMany(Aircraft::class);
    }

    /**
     * Get the instructors for the flight school
     */
    public function instructors(): HasMany
    {
        return $this->hasMany(User::class)->where('user_type', 'instructor');
    }
}

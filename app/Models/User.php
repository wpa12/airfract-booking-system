<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enums\UserTypes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\FlightSchool;

#[Fillable(['name', 'email', 'password', 'user_type', 'is_admin'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }

    /**
     * Get the flight school for the user
     */
    public function flightSchool(): BelongsTo
    {
        return $this->belongsTo(FlightSchool::class, 'flight_school_id');
    }

    /**
     * Check if the user is an administrator
     */
    public function isAdmin(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->attributes['is_admin'] === 1,
        );
    }

    public function isPilot(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->attributes['user_type'] === UserTypes::PILOT->value,
        );
    }

    public function isInstructor(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->attributes['user_type'] === UserTypes::INSTRUCTOR->value,
        );
    }
}

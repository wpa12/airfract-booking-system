<?php

namespace App\Enums;

enum UserTypes: string
{
    case PILOT = 'pilot';
    case INSTRUCTOR = 'instructor';
    case ADMIN = 'admin';

    public function label(): string
    {
        return match ($this) {
            self::PILOT => 'Pilot',
            self::INSTRUCTOR => 'Instructor',
            self::ADMIN => 'Admin',
        };
    }
}

<?php

namespace App\Enums;

enum BookableTypes: string
{
    case AIRCRAFT = 'aircraft';
    // case LESSON = 'lesson';

    public function label(): string
    {
        return match ($this) {
            self::AIRCRAFT => 'Aircraft',
            // self::LESSON => 'Lesson',
        };
    }
}

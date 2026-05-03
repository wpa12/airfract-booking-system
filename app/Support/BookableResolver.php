<?php

namespace App\Support;

use App\Contracts\BookableContract;
use App\Exceptions\BookableResolverException;
use App\Models\Aircraft;

// This is a support class to resolve a bookable model from an endpoint
final class BookableResolver
{
    public static function resolve(string $bookableType): BookableContract
    {
        return match ($bookableType) {
            'aircraft' => app(Aircraft::class),
            default => throw new BookableResolverException('Bookable type not found in resolver', $bookableType),
        };
    }
}

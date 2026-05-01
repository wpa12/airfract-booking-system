<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Airport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Airport>
 */
class AirportFactory extends Factory
{
    /**
     * UK airports used for demos and seeding. ICAO codes must be unique (see airports.icao_code).
     *
     * @return array<string, string>
     */
    public static function ukAirportCatalog(): array
    {
        return [
            'London Luton Airport' => 'EGGW',
            'London Heathrow Airport' => 'EGLL',
            'London Gatwick Airport' => 'EGKK',
            'London Stansted Airport' => 'EGSS',
            'London City Airport' => 'EGLC',
            'London Southend Airport' => 'EGMC',
            'Bristol Airport' => 'EGGD',
            'Manchester Airport' => 'EGCC',
            'Leeds Bradford Airport' => 'EGNM',
            'Newcastle Airport' => 'EGNT',
            'Sheffield Airport' => 'EGNY',
            'Liverpool John Lennon Airport' => 'EGGP',
            'East Midlands Airport' => 'EGNX',
            'Nottingham Airport' => 'EGBN',
            'Birmingham Airport' => 'EGBB',
            'Coventry Airport' => 'EGBE',
            'Leicester Airport' => 'EGBG',
        ];
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $airports = self::ukAirportCatalog();
        $airportByName = fake()->randomElement(array_keys($airports));
        $airportByIcao = $airports[$airportByName];

        return [
            'name' => $airportByName,
            'icao_code' => $airportByIcao,
            'address_id' => Address::factory()->create()->id,
            'avgas_price_per_litre' => fake()->randomFloat(2, 1, 2.5),
            'jetA1_price_per_litre' => fake()->randomFloat(2, 0.70, 2),
            'landing_fee' => fake()->randomFloat(2, 5, 20),
        ];
    }
}

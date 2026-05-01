<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Airports;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Airports>
 */
class AirportsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $airports = $this->getAirports();
        $airportByName = fake()->randomElement(array_keys($airports));
        $airportByIcao = $airports[$airportByName];

        return [
            'name' => $airportByName, // sets the name for the airport
            'icao_code' => $airportByIcao, // sets the ICAO Code for the airport
            'address_id' => Address::factory()->create()->id, // sets the address id for the airport
        ];
    }

    /**
     * Gets a list of aiports in the UK with their ICAO code
     */
    private function getAirports(): array
    {
        return [
            'London Luton Airport' => 'EGGW',
            'London Heathrow Airport' => 'EGLL',
            'London Gatwick Airport' => 'EGKK',
            'London Stansted Airport' => 'EGSS',
            'London City Airport' => 'EGLC',
            'London Southend Airport' => 'EGTJ',
            'Bristol Airport' => 'EGGD',
            'Manchester Airport' => 'EGCC',
            'Leeds Bradford Airport' => 'EGNM',
            'Newcastle Airport' => 'EGNT',
            'Sheffield Airport' => 'EGNY',
            'Liverpool John Lennon Airport' => 'EGGP',
            'East Midlands Airport' => 'EGNM',
            'Nottingham Airport' => 'EGNX',
            'Birmingham Airport' => 'EGBB',
            'Coventry Airport' => 'EGBJ',
            'Leicester Airport' => 'EGNH',
            'Nottingham East Midlands Airport' => 'EGNX',
        ];
    }
}

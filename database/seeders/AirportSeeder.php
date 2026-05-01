<?php

namespace Database\Seeders;

use App\Models\Airport;
use Database\Factories\AirportFactory;
use Illuminate\Database\Seeder;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (AirportFactory::ukAirportCatalog() as $name => $icaoCode) {
            Airport::factory()->create([
                'name' => $name,
                'icao_code' => $icaoCode,
            ]);
        }
    }
}

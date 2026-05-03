<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AddressSeeder;
use Database\Seeders\AirportSeeder;
use Database\Seeders\FuelTypeSeeder;
use Database\Seeders\EngineTypeSeeder;
use Database\Seeders\AircraftSeeder;
use Database\Seeders\FlightSchoolSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'is_admin' => true,
        ]);

        $this->call([
            AddressSeeder::class,
            AirportSeeder::class,
            FuelTypeSeeder::class,
            EngineTypeSeeder::class,
            FlightSchoolSeeder::class,
            AircraftSeeder::class,
            BookingSeeder::class,
        ]);
    }
}

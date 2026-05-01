<?php

namespace Database\Seeders;

use App\Models\FlightSchool;
use Illuminate\Database\Seeder;

class FlightSchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FlightSchool::factory()->count(10)->create(); // creates the flight schools within the database
    }
}

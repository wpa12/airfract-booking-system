<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\FuelType;
use Database\Factories\FuelTypeFactory;
use Illuminate\Database\Seeder;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (FuelTypeFactory::fuelTypeCatalog() as $type => $description) {
            FuelType::factory()->create([
                'type' => $type,
                'description' => $description,
            ]);
        }
    }
}

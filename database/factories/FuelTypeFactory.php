<?php

namespace Database\Factories;

use App\Models\FuelType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FuelType>
 */
class FuelTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fuelTypes = $this->getFuelTypes();
        $fuelType = fake()->unique()->randomElement(array_keys($fuelTypes));

        return [
            'type' => $fuelType,
            'description' => $fuelTypes[$fuelType],
        ];
    }

    /**
     * Gets the fuel types within aviation
     *
     * @return array
     */
    private function getFuelTypes(): array
    {
        return [
            'avgas' => 'Aviation gasoline',
            'jetA1' => 'Jet A-1',
        ];
    }
}

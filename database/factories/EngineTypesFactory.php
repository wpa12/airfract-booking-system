<?php

namespace Database\Factories;

use App\Models\EngineType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EngineType>
 */
class EngineTypesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $engineTypes = $this->getEngineTypes();
        $engineType = fake()->unique()->randomElement(array_keys($engineTypes));

        return [
            'type' => $engineType,
            'description' => $engineTypes[$engineType],
        ];
    }

    /**
     * Returns the engine Types
     *
     * @return array
     */
    private function getEngineTypes(): array
    {
        // array of engine types and their descriptions
        return [
            'single' => 'single engine',
            'multi' => 'multi engine',
            'jet' => 'jet engine',
            'twinjet' => 'twinjet engine',
            'turboprop' => 'turboprop engine',
            'twinturboprop' => 'twin-turboprop engine',
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $logo = 'combat_icons/company.png';
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->text,
            'status' => $this->faker->randomElement(['operativa', 'inoperativa']),
            'max_subordinates' => $this->faker->numberBetween(1, 10),
            'current_subordinates' => $this->faker->numberBetween(0, 10),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'combat_logo' => $logo
        ];
    }
}

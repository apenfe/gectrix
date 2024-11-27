<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Platoon>
 */
class PlatoonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $logo = 'combat_icons/platoon.png';
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'status' => $this->faker->randomElement(['operativa', 'inoperativa']),
            'max_subordinates' => $this->faker->randomNumber(2),
            'current_subordinates' => $this->faker->randomNumber(2),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'combat_logo' => $logo,
        ];
    }
}
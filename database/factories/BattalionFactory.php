<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Battalion>
 */
class BattalionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'status' => $this->faker->randomElement(['operativa', 'inoperativa']),
            'max_subordinates' => $this->faker->randomNumber(2),
            'current_subordinates' => $this->faker->randomNumber(2),
            'latitude' => $this->faker->randomFloat(7, 0, 90),
            'longitude' => $this->faker->randomFloat(7, 0, 180),
            'combat_logo' => $this->faker->imageUrl()
        ];
    }
}

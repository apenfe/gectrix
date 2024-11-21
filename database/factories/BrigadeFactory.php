<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brigade>
 */
class BrigadeFactory extends Factory
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
            'army' => $this->faker->randomElement(['tierra', 'aire', 'armada', 'general', 'infanteria_marina']),
            'status' => $this->faker->randomElement(['operativa', 'inoperativa']),
            'max_subordinates' => $this->faker->numberBetween(1, 10),
            'current_subordinates' => $this->faker->numberBetween(0, 10),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'combat_logo' => $this->faker->imageUrl(),
            'unit_emblem' => $this->faker->imageUrl()
        ];
    }
}

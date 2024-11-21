<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand' => $this->faker->company,
            'model' => $this->faker->word,
            'type' => $this->faker->randomElement(['car', 'motorcycle', 'truck', 'bus', 'tank', 'airplane', 'helicopter', 'boat']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'seats' => $this->faker->numberBetween(1, 9),
            'liters' => $this->faker->numberBetween(1, 100),
            'liters_per_100km' => $this->faker->numberBetween(1, 100),
            'fuel' => $this->faker->randomElement(['gasoline', 'diesel']),
            'liters_reserve' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->numberBetween(1, 1000),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->text,
            'weight' => $this->faker->randomFloat(2, 1, 100),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude
        ];
    }
}

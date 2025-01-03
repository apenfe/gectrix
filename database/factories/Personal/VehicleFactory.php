<?php

namespace Database\Factories\Personal;

use App\Traits\LocationHandler;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personal\Vehicle>
 */
class VehicleFactory extends Factory
{
    use LocationHandler;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $position = $this->spain();

        return [
            'brand' => $this->faker->company,
            'model' => $this->faker->word,
            'type' => $this->faker->randomElement(['car', 'truck', 'bus', 'tank', 'helicopter', 'boat']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'seats' => $this->faker->numberBetween(4, 6),
            'liters' => $this->faker->numberBetween(1, 100),
            'liters_per_100km' => $this->faker->numberBetween(1, 40),
            'fuel' => $this->faker->randomElement(['gasoline', 'diesel']),
            'liters_reserve' => $this->faker->numberBetween(1, 20),
            'price' => $this->faker->numberBetween(1, 1000),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->text,
            'weight' => $this->faker->randomFloat(2, 1, 100),
            'latitude' => $position['latitude'],
            'longitude' => $position['longitude'],
        ];
    }
}

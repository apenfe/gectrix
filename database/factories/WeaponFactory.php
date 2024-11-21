<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Weapon>
 */
class WeaponFactory extends Factory
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
            'caliber' => $this->faker->randomElement(['9mm', '5.56mm', '7.62mm', '12.7mm', '20mm', '40mm', '60mm', '80mm', '100mm', '120mm']),
            'type' => $this->faker->randomElement(['pistol', 'rifle', 'machine gun', 'sniper rifle', 'grenade launcher', 'rocket launcher', 'mortar', 'missile launcher', 'laser gun', 'plasma gun', 'ion gun', 'microwave gun']),
            'action' => $this->faker->randomElement(['one-shot','non-automatic', 'semi-automatic', 'automatic']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'price' => $this->faker->numberBetween(100, 10000),
            'device-id' => $this->faker->uuid,
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->text,
            'max-range' => $this->faker->numberBetween(100, 10000),
            'weight' => $this->faker->randomFloat(2, 1, 100),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude
        ];
    }
}

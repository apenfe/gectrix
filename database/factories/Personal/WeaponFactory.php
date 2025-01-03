<?php

namespace Database\Factories\Personal;

use App\Traits\LocationHandler;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personal\Weapon>
 */
class WeaponFactory extends Factory
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
            'caliber' => $this->faker->randomElement(['9mm', '5.56mm', '7.62mm', '12.7mm', '20mm', '40mm', '60mm', '80mm', '100mm', '120mm']),
            'type' => $this->faker->randomElement(['pistol', 'rifle', 'machine gun', 'sniper rifle', 'grenade launcher', 'rocket launcher', 'mortar', 'missile launcher', 'laser gun', 'plasma gun', 'ion gun', 'microwave gun']),
            'action' => $this->faker->randomElement(['one-shot', 'non-automatic', 'semi-automatic', 'automatic']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'price' => $this->faker->numberBetween(100, 10000),
            'deviceId' => $this->faker->uuid,
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->text,
            'maxRange' => $this->faker->numberBetween(100, 10000),
            'weight' => $this->faker->randomFloat(2, 1, 100),
            'latitude' => $position['latitude'],
            'longitude' => $position['longitude'],
        ];
    }
}

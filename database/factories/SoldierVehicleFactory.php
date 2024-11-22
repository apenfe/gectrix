<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SoldierVehicle>
 */
class SoldierVehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'role' => $this->faker->randomElement(['driver', 'gunner', 'passenger']),
            'assigned_at' => $this->faker->date(),
            'unassigned_at' => $this->faker->date(),
        ];
    }
}

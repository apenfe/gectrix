<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Soldier>
 */
class SoldierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'tim' => $this->faker->unique()->randomNumber(8),
            'rank' => $this->faker->randomElement(['soldado', 'cabo', 'sargento', 'teniente', 'capitan', 'coronel']),
            'rank_image' => 'default.jpg',
            'age' => $this->faker->numberBetween(18, 50),
            'scale' => $this->faker->randomElement(['tropa', 'suboficial', 'oficial']),
            'specialty' => $this->faker->randomElement(['infanteria', 'caballeria', 'artilleria', 'ingenieros', 'comunicaciones']),
            'status' => $this->faker->randomElement(['baja', 'operativo', 'abatido']),
            'photo' => 'default.jpg',
            'salary' => $this->faker->numberBetween(1000, 5000),
            'date_of_birth' => $this->faker->date(),
            'date_of_death' => $this->faker->date(),
            'date_of_enlistment' => $this->faker->date(),
            'date_of_demobilization' => $this->faker->date(),
            'years_of_service' => $this->faker->numberBetween(1, 30)
        ];
    }
}

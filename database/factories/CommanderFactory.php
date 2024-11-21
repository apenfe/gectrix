<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commander>
 */
class CommanderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'last_name' => $this->faker->lastName(),
            'tim' => $this->faker->unique()->userName(),
            'rank' => $this->faker->randomElement(['General', 'Coronel', 'Mayor', 'Capitán', 'Teniente', 'Subteniente', 'Sargento', 'Cabo', 'Soldado']),
            'rank_image' => 'default.jpg',
            'age' => $this->faker->numberBetween(18, 60),
            'scale' => $this->faker->randomElement(['oficiales', 'suboficiales', 'tropa']),
            'specialty' => $this->faker->sentence(3),
            'status' => $this->faker->randomElement(['baja', 'operativo', 'abatido']),
            'email' => $this->faker->unique()->safeEmail(),
            'telephone' => $this->faker->unique()->phoneNumber(),
            'photo' => 'default.jpg',
            'salary' => $this->faker->numberBetween(1000, 10000),
            'date_of_birth' => $this->faker->date(),
            'date_of_death' => $this->faker->date(),
            'date_of_enlistment' => $this->faker->date(),
            'date_of_demobilization' => $this->faker->date(),
            'years_of_service' => $this->faker->numberBetween(1, 30),
        ];
    }
}

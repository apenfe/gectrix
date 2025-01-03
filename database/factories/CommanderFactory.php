<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personal\Commander>
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
        $user = rand(1, 99);

        $brigade = 'tierra';

        $rank = $this->faker->randomElement(['general', 'coronel', 'teniente coronel', 'capitan', 'teniente', 'sargento', 'cabo']);

        return [
            'name' => $this->faker->name(),
            'last_name' => $this->faker->lastName(),
            'tim' => $this->faker->unique()->userName(),
            'rank' => $rank,
            'rank_image' => 'rank_logos/'.$brigade.'/'.$rank.'.png',
            'scale' => $this->faker->randomElement(['oficiales', 'suboficiales', 'tropa']),
            'specialty' => $this->faker->sentence(3),
            'status' => $this->faker->randomElement(['baja', 'operativo']),
            'email' => $this->faker->unique()->safeEmail(),
            'telephone' => $this->faker->unique()->phoneNumber(),
            'photo' => 'https://randomuser.me/Api/portraits/men/'.$user.'.jpg',
            'salary' => $this->faker->numberBetween(1000, 10000),
            'date_of_birth' => $this->faker->date(),
            'date_of_death' => null, // ver como mejorar
            'date_of_enlistment' => $this->faker->date(),
            'date_of_demobilization' => null,
        ];
    }
}

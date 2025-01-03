<?php

namespace Database\Factories\Personal;

use App\Traits\LocationHandler;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personal\Battalion>
 */
class BattalionFactory extends Factory
{
    use LocationHandler;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // cragar la ruta de la imagen
        $logo = 'combat_icons/battalion.png';

        $position = $this->spain();

        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'status' => $this->faker->randomElement(['operativa', 'inoperativa']),
            'max_subordinates' => $this->faker->randomNumber(2),
            'current_subordinates' => $this->faker->randomNumber(2),
            'latitude' => $position['latitude'],
            'longitude' => $position['longitude'],
            'combat_logo' => $logo,
        ];
    }
}

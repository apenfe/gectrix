<?php

namespace Database\Factories\Personal;

use App\Traits\LocationHandler;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personal\Company>
 */
class CompanyFactory extends Factory
{
    use LocationHandler;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $logo = 'combat_icons/company.png';
        $position = $this->spain();

        return [
            'name' => $this->faker->company,
            'description' => $this->faker->text,
            'status' => $this->faker->randomElement(['operativa', 'inoperativa']),
            'max_subordinates' => $this->faker->numberBetween(1, 10),
            'current_subordinates' => $this->faker->numberBetween(0, 10),
            'latitude' => $position['latitude'],
            'longitude' => $position['longitude'],
            'combat_logo' => $logo,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\EarlyWarning\Target;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TargetFactory extends Factory
{
    protected $model = Target::class;

    public function definition(): array
    {
        return [
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'status' => $this->faker->boolean(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'radius' => $this->faker->numberBetween(1, 100),
            'image' => $this->faker->imageUrl(),
            'logo' => $this->faker->imageUrl(),
            'setup_date' => Carbon::now(),
            'deactivation_date' => Carbon::now(),
            'action' => $this->faker->randomElement(['attack', 'defense', 'reconnaissance']),
        ];
    }
}

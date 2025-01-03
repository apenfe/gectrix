<?php

namespace Database\Factories;

use App\Models\EarlyWarning\Alert;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AlertFactory extends Factory
{
    protected $model = Alert::class;

    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['air-strike', 'ground-attack', 'naval-bombardment']),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'radius' => $this->faker->numberBetween(1, 100),
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'description' => $this->faker->text,
            'danger_level' => $this->faker->randomElement(['low', 'medium', 'high']),
        ];
    }
}

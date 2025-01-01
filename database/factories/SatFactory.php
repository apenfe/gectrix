<?php

namespace Database\Factories;

use App\Models\Sat;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SatFactory extends Factory
{
    protected $model = Sat::class;

    public function definition(): array
    {
        return [
            'image_route' => $this->faker->imageUrl(),
            'date' => Carbon::now(),
            'satellite' => $this->faker->randomElement(['sentinel1', 'sentinel2']),
            'cloud_coverage' => $this->faker->numberBetween( 0, 100),
            'latitude_north' => $this->faker->latitude(),
            'latitude_south' => $this->faker->latitude(),
            'longitude_east' => $this->faker->longitude(),
            'longitude_west' => $this->faker->longitude(),
            'target_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}

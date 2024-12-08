<?php

namespace Database\Factories;

use App\Models\Strategic;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StrategicFactory extends Factory {
    protected $model = Strategic::class;

    public function definition(): array {
        return ['created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),];
    }
}

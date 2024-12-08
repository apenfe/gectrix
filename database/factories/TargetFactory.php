<?php

namespace Database\Factories;

use App\Models\Target;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TargetFactory extends Factory {
    protected $model = Target::class;

    public function definition(): array {
        return ['created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),];
    }
}

<?php

namespace Database\Factories;

use App\Models\Sat;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SatFactory extends Factory {
    protected $model = Sat::class;

    public function definition(): array {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ];
    }
}

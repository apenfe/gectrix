<?php

namespace Database\Factories;

use App\Models\Alert;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AlertFactory extends Factory {
    protected $model = Alert::class;

    public function definition(): array {
        return ['created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),];
    }
}

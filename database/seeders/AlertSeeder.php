<?php

namespace Database\Seeders;

use App\Models\Alert;
use Illuminate\Database\Seeder;

class AlertSeeder extends Seeder
{
    public function run(): void
    {
        $alerts = [
            [
                'type' => 'air-strike',
                'latitude' => 40.416775,
                'longitude' => -3.703790,
                'radius' => 10,
                'start_date' => now(),
                'end_date' => now()->addDays(1),
                'description' => 'Air strike in Madrid',
                'danger_level' => 'high',
            ],
            [
                'type' => 'ground-attack',
                'latitude' => 41.385063,
                'longitude' => 2.173404,
                'radius' => 20,
                'start_date' => now(),
                'end_date' => now()->addDays(1),
                'description' => 'Ground attack in Barcelona',
                'danger_level' => 'medium',
            ],
            [
                'type' => 'naval-bombardment',
                'latitude' => 37.389092,
                'longitude' => -5.984459,
                'radius' => 50,
                'start_date' => now(),
                'end_date' => now()->addDays(1),
                'description' => 'Naval bombardment in Sevilla',
                'danger_level' => 'low',
            ],
            [
                'type' => 'naval-bombardment',
                'latitude' => 37.625683,
                'longitude' => -0.996584,
                'radius' => 50,
                'start_date' => now(),
                'end_date' => now()->addDays(1),
                'description' => 'Naval bombardment in Cartagena',
                'danger_level' => 'low',
            ],
            [
                'type' => 'naval-bombardment',
                'latitude' => 35.889387,
                'longitude' => -5.321345,
                'radius' => 50,
                'start_date' => now(),
                'end_date' => now()->addDays(1),
                'description' => 'Naval bombardment in Ceuta',
                'danger_level' => 'low',
            ],
        ];

        foreach ($alerts as $alert) {
            Alert::create($alert);
        }
    }
}

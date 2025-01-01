<?php

namespace Database\Seeders;

use App\Models\Target;
use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    public function run(): void
    {
        // Objetivos a crear
        $targets = [
            [
                'priority' => 'low',
                'status' => true,
                'name' => 'Objetivo 1',
                'description' => 'Descripción del objetivo 1',
                'latitude' => 40.416775,
                'longitude' => -3.703790,
                'radius' => 10,
                'image' => 'target.png',
                'logo' => 'target.png',
                'setup_date' => now(),
                'deactivation_date' => now()->addDays(1),
                'action' => 'attack',
            ],
            [
                'priority' => 'medium',
                'status' => true,
                'name' => 'Objetivo 2',
                'description' => 'Descripción del objetivo 2',
                'latitude' => 41.385063,
                'longitude' => 2.173404,
                'radius' => 20,
                'image' => 'target.png',
                'logo' => 'target.png',
                'setup_date' => now(),
                'deactivation_date' => now()->addDays(1),
                'action' => 'defense',
            ],
            [
                'priority' => 'high',
                'status' => true,
                'name' => 'Objetivo 3',
                'description' => 'Descripción del objetivo 3',
                'latitude' => 37.389092,
                'longitude' => -5.984459,
                'radius' => 50,
                'image' => 'target.png',
                'logo' => 'target.png',
                'setup_date' => now(),
                'deactivation_date' => now()->addDays(1),
                'action' => 'reconnaissance',
            ],
        ];

        // Crear objetivos
        Target::factory(4)->create([
            'image' => 'target.png',
            'logo' => 'target.png',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\EarlyWarning\Sat;
use App\Models\EarlyWarning\Target;
use Illuminate\Database\Seeder;

class SatSeeder extends Seeder {
    public function run(): void {

        // Satélites a crear 2 por cada target
        $targets = Target::all();

        foreach ($targets as $target) {
            Sat::factory(2)->create([
                'target_id' => $target->id
            ]);
        }

    }
}

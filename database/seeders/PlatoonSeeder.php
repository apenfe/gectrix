<?php

namespace Database\Seeders;

use App\Models\Personal\Commander;
use App\Models\Personal\Platoon;
use App\Models\Personal\Section;
use Illuminate\Database\Seeder;

class PlatoonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Filtrar comandantes con rango de comandante y que no sean mandos de otro cuerpo
        $generalCommanders = Commander::where('rank', 'sargento')
            ->doesntHave('platoon')
            ->get();

        $sections = Section::all();

        // Insertar los regimientos en la base de datos
        for ($i = 0; $i < 384; $i++) {

            Platoon::create([
                'name' => 'Pelotón de Infantería nº '.($i + 1),
                'description' => 'Pelotón de Infantería ligera',
                'status' => 'operativa',
                'max_subordinates' => 2,
                'current_subordinates' => 2,
                'combat_logo' => 'platoons/infanteria.jpg',
                'commander_id' => $generalCommanders[$i]->id,
                'section_id' => $sections[$i % 128]->id,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Commander;
use App\Models\Platoon;
use App\Models\Section;
use App\Models\Squad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SquadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Filtrar comandantes con rango de comandante y que no sean mandos de otro cuerpo
        $generalCommanders = Commander::where('rank', 'cabo')
            ->doesntHave('squad')
            ->get();

        $platoons = Platoon::all();

        // Insertar los regimientos en la base de datos
        for ($i = 0; $i < 768; $i++) {

            Squad::create([
                'name' => 'Escuadra de Infantería nº ' . ($i + 1),
                'description' => 'Escuadra de Infantería ligera',
                'status' => 'operativa',
                'max_subordinates' => 4,
                'current_subordinates' => 4,
                'combat_logo' => 'squads/infanteria.jpg',
                'commander_id' => $generalCommanders[$i]->id,
                'platoon_id' => $platoons[$i % 384]->id
            ]);
        }
    }
}

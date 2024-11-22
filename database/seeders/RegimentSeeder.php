<?php

namespace Database\Seeders;

use App\Models\Brigade;
use App\Models\Commander;
use App\Models\Regiment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegimentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Filtrar comandantes con rango de comandante y que no sean mandos de otro cuerpo
        $generalCommanders = Commander::where('rank', 'coronel')
            ->doesntHave('regiment')
            ->get();

        // Crear los regimientos predefinidos
        $regiments = [
            [
                'name' => 'Regimiento de Infantería nº 1',
                'description' => 'Regimiento de Infantería ligera',
                'status' => 'operativa',
                'max_subordinates' => 2,
                'current_subordinates' => 2,
                'combat_logo' => 'regiments/infanteria.jpg',
                'commander_id' => $generalCommanders[0]->id,
                'brigade_id' => 1
            ],
            [
                'name' => 'Regimiento de Infantería nº 2',
                'description' => 'Regimiento de Infantería ligera',
                'status' => 'operativa',
                'max_subordinates' => 2,
                'current_subordinates' => 2,
                'combat_logo' => 'regiments/infanteria.jpg',
                'commander_id' => $generalCommanders[1]->id,
                'brigade_id' => 1
            ],
            [
                'name' => 'Regimiento de Infantería nº 3',
                'description' => 'Regimiento de Infantería ligera',
                'status' => 'operativa',
                'max_subordinates' => 2,
                'current_subordinates' => 2,
                'combat_logo' => 'regiments/infanteria.jpg',
                'commander_id' => $generalCommanders[2]->id,
                'brigade_id' => 1
            ],
            [
                'name' => 'Regimiento de Infantería nº 4',
                'description' => 'Regimiento de Infantería ligera',
                'status' => 'operativa',
                'max_subordinates' => 2,
                'current_subordinates' => 2,
                'combat_logo' => 'regiments/infanteria.jpg',
                'commander_id' => $generalCommanders[3]->id,
                'brigade_id' => 1
            ],
        ];

        // Insertar los regimientos en la base de datos
        foreach ($regiments as $regiment) {
            Regiment::create($regiment);
        }
    }
}

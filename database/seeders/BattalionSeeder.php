<?php

namespace Database\Seeders;

use App\Models\Battalion;
use App\Models\Commander;
use App\Models\Regiment;
use Illuminate\Database\Seeder;

class BattalionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Filtrar comandantes con rango de comandante y que no sean mandos de otro cuerpo
        $generalCommanders = Commander::where('rank', 'teniente coronel')
            ->doesntHave('battalion')
            ->get();

        $regiments = Regiment::all();

        // Crear los regimientos predefinidos // 8
        $battalions = [
            [
                'name' => 'Batallón de Infantería nº 1',
                'description' => 'Batallón de Infantería ligera',
                'status' => 'operativa',
                'max_subordinates' => 4,
                'current_subordinates' => 4,
                'combat_logo' => 'battalions/infanteria.jpg',
                'commander_id' => $generalCommanders[0]->id,
                'regiment_id' => $regiments[0]->id,
            ],
            [
                'name' => 'Batallón de Infantería nº 2',
                'description' => 'Batallón de Infantería ligera',
                'status' => 'operativa',
                'max_subordinates' => 4,
                'current_subordinates' => 4,
                'combat_logo' => 'battalions/infanteria.jpg',
                'commander_id' => $generalCommanders[1]->id,
                'regiment_id' => $regiments[0]->id,
            ],
            [
                'name' => 'Batallón de Infantería nº 3',
                'description' => 'Batallón de Infantería ligera',
                'status' => 'operativa',
                'max_subordinates' => 4,
                'current_subordinates' => 4,
                'combat_logo' => 'battalions/infanteria.jpg',
                'commander_id' => $generalCommanders[2]->id,
                'regiment_id' => $regiments[1]->id,
            ],
            [
                'name' => 'Batallón de Infantería nº 4',
                'description' => 'Batallón de Infantería ligera',
                'status' => 'operativa',
                'max_subordinates' => 4,
                'current_subordinates' => 4,
                'combat_logo' => 'battalions/infanteria.jpg',
                'commander_id' => $generalCommanders[3]->id,
                'regiment_id' => $regiments[1]->id,
            ],
            [
                'name' => 'Batallón de Infantería nº 5',
                'description' => 'Batallón de Infantería ligera',
                'status' => 'operativa',
                'max_subordinates' => 4,
                'current_subordinates' => 4,
                'combat_logo' => 'battalions/infanteria.jpg',
                'commander_id' => $generalCommanders[4]->id,
                'regiment_id' => $regiments[2]->id,
            ],
            [
                'name' => 'Batallón de Infantería nº 6',
                'description' => 'Batallón de Infantería ligera',
                'status' => 'operativa',
                'max_subordinates' => 4,
                'current_subordinates' => 4,
                'combat_logo' => 'battalions/infanteria.jpg',
                'commander_id' => $generalCommanders[5]->id,
                'regiment_id' => $regiments[2]->id,
            ],
            [
                'name' => 'Batallón de Infantería nº 7',
                'description' => 'Batallón de Infantería ligera',
                'status' => 'operativa',
                'max_subordinates' => 4,
                'current_subordinates' => 4,
                'combat_logo' => 'battalions/infanteria.jpg',
                'commander_id' => $generalCommanders[6]->id,
                'regiment_id' => $regiments[3]->id,
            ],
            [
                'name' => 'Batallón de Infantería nº 8',
                'description' => 'Batallón de Infantería ligera',
                'status' => 'operativa',
                'max_subordinates' => 4,
                'current_subordinates' => 4,
                'combat_logo' => 'battalions/infanteria.jpg',
                'commander_id' => $generalCommanders[7]->id,
                'regiment_id' => $regiments[3]->id,
            ],

        ];

        // Insertar los regimientos en la base de datos
        foreach ($battalions as $battalion) {
            Battalion::create($battalion);
        }
    }
}

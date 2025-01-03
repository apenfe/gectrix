<?php

namespace Database\Seeders;

use App\Models\Personal\Brigade;
use App\Models\Personal\Commander;
use Illuminate\Database\Seeder;

class BrigadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Filtrar comandantes con rango de general y que no sean mandos de otro cuerpo
        $generalCommanders = Commander::where('rank', 'general')
            ->doesntHave('brigade')
            ->get();

        // Crear las brigadas predefinidas
        $brigades = [
            [
                'name' => 'Brigada paracaidista',
                'description' => 'Brigada de Infantería ligera y paracaidista',
                'army' => 'tierra',
                'status' => 'operativa',
                'max_subordinates' => 4,
                'current_subordinates' => 4,
                'combat_logo' => 'brigate.png',
                'unit_emblem' => 'Bripac.png',
                'commander_id' => $generalCommanders->random()->id,
            ],
        ];

        // Insertar las brigadas en la base de datos
        foreach ($brigades as $brigade) {
            Brigade::create($brigade);
        }
    }
}

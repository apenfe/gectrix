<?php

namespace Database\Seeders;

use App\Models\Commander;
use App\Models\Platoon;
use App\Models\Soldier;
use App\Models\Squad;
use App\Models\Weapon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoldierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Filtrar armas que no tengan comandante ni vehiculo asignado
        $freeWeapons = Weapon::whereDoesntHave('commander')
            ->whereDoesntHave('vehicle')
            ->get();

        $squads = Squad::all();

        // Insertar los regimientos en la base de datos
        for ($i = 0; $i < 3072; $i++) {

            Soldier::factory()->create([
                'rank' => 'soldado',
                'rank_image' => 'soldado.jpg',
                'scale' => 'tropa',
                'specialty' => 'Infantería',
                'status' => 'operativo',
                'date_of_birth' => '1990-05-12',
                'date_of_enlistment' => '2005-07-15',
                'date_of_death' => null,
                'date_of_demobilization' => null,
                'squad_id' => $squads[$i % 768]->id,
                'weapon_id' => $freeWeapons[$i]->id
            ]);

        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Battalion;
use App\Models\Commander;
use App\Models\Company;
use App\Models\Regiment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Filtrar comandantes con rango de comandante y que no sean mandos de otro cuerpo
        $generalCommanders = Commander::where('rank', 'capitan')
            ->doesntHave('company')
            ->get();

        $battalions = Battalion::all();

        // Insertar los regimientos en la base de datos
        for ($i = 0; $i < 32; $i++) {

            	// Asignar un batallón a cada compañía teniendo en cuanta que son 8
            $battalionId = $battalions[$i % 8]->id;

            Company::create([
                'name' => 'Compañía de Infantería nº ' . ($i + 1),
                'description' => 'Compañía de Infantería ligera',
                'status' => 'operativa',
                'max_subordinates' => 4,
                'current_subordinates' => 4,
                'combat_logo' => 'companies/infanteria.jpg',
                'commander_id' => $generalCommanders[$i]->id,
                'battalion_id' => $battalionId
            ]);
        }
    }
}

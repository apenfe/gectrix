<?php

namespace Database\Seeders;

use App\Models\Personal\Commander;
use App\Models\Personal\Company;
use App\Models\Personal\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Filtrar comandantes con rango de comandante y que no sean mandos de otro cuerpo
        $generalCommanders = Commander::where('rank', 'teniente')
            ->doesntHave('section')
            ->get();

        $companies = Company::all();

        // Insertar los regimientos en la base de datos
        for ($i = 0; $i < 128; $i++) {

            // Asignar un batallón a cada compañía teniendo en cuanta que son 8
            $companyId = $companies[$i % 32]->id;

            Section::create([
                'name' => 'Sección de Infantería nº '.($i + 1),
                'description' => 'Sección de Infantería ligera',
                'status' => 'operativa',
                'max_subordinates' => 3,
                'current_subordinates' => 3,
                'combat_logo' => 'sections/infanteria.jpg',
                'commander_id' => $generalCommanders[$i]->id,
                'company_id' => $companyId,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Commander;
use App\Models\Weapon;
use Illuminate\Database\Seeder;

class CommanderSeeder extends Seeder
{
    protected $predefinedCommanders = [
        // Oficiales
        // general
        [
            'rank' => 'general',
            'scale' => 'oficiales',
            'specialty' => 'Infantería',
            'status' => 'operativo',
            'date_of_birth' => '1987-05-12',
            'date_of_enlistment' => '2005-07-15',
            'rank_image' => 'private/rank_logos/tierra/general.png',
            'quantity' => 1, // Cuántas copias queremos de este comandante
        ],

        // Coronel
        [
            'rank' => 'coronel',
            'scale' => 'oficiales',
            'specialty' => 'Infantería',
            'status' => 'operativo',
            'date_of_birth' => '1990-05-12',
            'date_of_enlistment' => '2005-07-15',
            'rank_image' => 'private/rank_logos/tierra/coronel.png',
            'quantity' => 4, // Cuántas copias queremos de este comandante
        ],
        // Teniente Coronel
        [
            'rank' => 'teniente coronel',
            'scale' => 'oficiales',
            'specialty' => 'Infantería',
            'status' => 'operativo',
            'date_of_birth' => '1990-05-12',
            'date_of_enlistment' => '2005-07-15',
            'rank_image' => 'private/rank_logos/tierra/tenientecoronel.png',
            'quantity' => 8, // Cuántas copias queremos de este comandante
        ],

        // Capitan
        [
            'rank' => 'capitan',
            'scale' => 'oficiales',
            'specialty' => 'Infantería',
            'status' => 'operativo',
            'date_of_birth' => '1990-05-12',
            'date_of_enlistment' => '2005-07-15',
            'rank_image' => 'private/rank_logos/tierra/capitan.png',
            'quantity' => 32, // Cuántas copias queremos de este comandante
        ],
        // Teniente
        [
            'rank' => 'teniente',
            'scale' => 'oficiales',
            'specialty' => 'Infantería',
            'status' => 'operativo',
            'date_of_birth' => '1990-05-12',
            'date_of_enlistment' => '2005-07-15',
            'rank_image' => 'private/rank_logos/tierra/teniente.png',

            'quantity' => 128, // Cuántas copias queremos de este comandante
        ],
        // Sargento
        [
            'rank' => 'sargento',
            'scale' => 'suboficiales',
            'specialty' => 'Infantería',
            'status' => 'operativo',
            'date_of_birth' => '1990-05-12',
            'date_of_enlistment' => '2005-07-15',
            'rank_image' => 'private/rank_logos/tierra/sargento.png',
            'quantity' => 384, // Cuántas copias queremos de este comandante
        ],

        // Cabo
        [
            'rank' => 'cabo',
            'scale' => 'tropa',
            'specialty' => 'Infantería',
            'status' => 'operativo',
            'date_of_birth' => '1990-05-12',
            'date_of_enlistment' => '2005-07-15',
            'rank_image' => 'private/rank_logos/tierra/cabo.png',
            'quantity' => 768, // Cuántas copias queremos de este comandante
        ],

    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear las armas predefinidas con sus cantidades específicas
        foreach ($this->predefinedCommanders as $commanderData) {
            $quantity = $commanderData['quantity'];
            unset($commanderData['quantity']); // Removemos quantity ya que no es parte del modelo

            for ($i = 0; $i < $quantity; $i++) {
                Commander::factory()->create([
                    ...$commanderData,
                    'date_of_death' => null,
                    'date_of_demobilization' => null,
                    'weapon_id' => Weapon::doesntHave('commander')->pluck('id')->random(),
                ]);
            }
        }
    }
}

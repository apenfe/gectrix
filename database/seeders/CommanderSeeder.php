<?php

namespace Database\Seeders;

use App\Models\Commander;
use App\Models\Weapon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CommanderSeeder extends Seeder
{
    protected $predefinedCommanders = [
        // Oficiales
        // general
        [
            'rank' => 'general',
            'rank_image' => 'general.jpg',
            'scale' => 'oficiales',
            'specialty' => 'Infantería',
            'status' => 'operativo',
            'date_of_birth' => '1987-05-12',
            'date_of_enlistment' => '2005-07-15',
            'years_of_service' => 16,
            'quantity' => 1 // Cuántas copias queremos de este comandante
        ],

        // Coronel
        [
            'rank' => 'coronel',
            'rank_image' => 'coronel.jpg',
            'scale' => 'oficiales',
            'specialty' => 'Infantería',
            'status' => 'operativo',
            'date_of_birth' => '1990-05-12',
            'date_of_enlistment' => '2005-07-15',
            'years_of_service' => 15,
            'quantity' => 4 // Cuántas copias queremos de este comandante
        ],
        // Teniente Coronel
        [
            'rank' => 'teniente coronel',
            'rank_image' => 'teniente_coronel.jpg',
            'scale' => 'oficiales',
            'specialty' => 'Infantería',
            'status' => 'operativo',
            'date_of_birth' => '1990-05-12',
            'date_of_enlistment' => '2005-07-15',
            'years_of_service' => 12,
            'quantity' => 8 // Cuántas copias queremos de este comandante
        ],

        // Capitan
        [
            'rank' => 'capitan',
            'rank_image' => 'capitan.jpg',
            'scale' => 'oficiales',
            'specialty' => 'Infantería',
            'status' => 'operativo',
            'date_of_birth' => '1990-05-12',
            'date_of_enlistment' => '2005-07-15',
            'years_of_service' => 10,
            'quantity' => 32 // Cuántas copias queremos de este comandante
        ],
        // Teniente
        [
            'rank' => 'teniente',
            'rank_image' => 'teniente.jpg',
            'scale' => 'oficiales',
            'specialty' => 'Infantería',
            'status' => 'operativo',
            'date_of_birth' => '1990-05-12',
            'date_of_enlistment' => '2005-07-15',
            'years_of_service' => 5,
            'quantity' => 128 // Cuántas copias queremos de este comandante
        ],
        // Sargento
        [
            'rank' => 'sargento',
            'rank_image' => 'sargento.jpg',
            'scale' => 'suboficiales',
            'specialty' => 'Infantería',
            'status' => 'operativo',
            'date_of_birth' => '1990-05-12',
            'date_of_enlistment' => '2005-07-15',
            'years_of_service' => 8,
            'quantity' => 384 // Cuántas copias queremos de este comandante
        ],

        // Cabo
        [
            'rank' => 'cabo',
            'rank_image' => 'cabo.jpg',
            'scale' => 'tropa',
            'specialty' => 'Infantería',
            'status' => 'operativo',
            'date_of_birth' => '1990-05-12',
            'date_of_enlistment' => '2005-07-15',
            'years_of_service' => 6,
            'quantity' => 768 // Cuántas copias queremos de este comandante
        ]

    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear las armas predefinidas con sus cantidades específicas
        foreach ($this->predefinedCommanders as $commanderData ) {
            $quantity = $commanderData['quantity'];
            unset($commanderData['quantity']); // Removemos quantity ya que no es parte del modelo

            for ($i = 0; $i < $quantity; $i++) {
                Commander::factory()->create([
                    ...$commanderData,
                    'date_of_death' => null,
                    'date_of_demobilization' => null,
                    'weapon_id' => Weapon::doesntHave('commanders')->pluck('id')->random()
                ]);
            }
        }
    }
}

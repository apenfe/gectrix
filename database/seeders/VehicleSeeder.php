<?php

namespace Database\Seeders;

use App\Models\Personal\Vehicle;
use App\Models\Personal\Weapon;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    protected $predefinedVehicles = [
        // Jeep
        [
            'brand' => 'Jeep',
            'model' => 'Wrangler',
            'type' => 'car',
            'status' => 'active',
            'fuel' => 'gasoline',
            'price' => 30000,
            'image' => 'jeep.png',
            'description' => 'Off-road vehicle',
            'quantity' => 10,
        ],
        // Tanques
        [
            'brand' => 'M1 Abrams',
            'model' => 'M1A2',
            'type' => 'tank',
            'status' => 'active',
            'fuel' => 'diesel',
            'price' => 5000000,
            'image' => 'tank.jpeg',
            'description' => 'Main battle tank',
            'quantity' => 5,
        ],
        // 8X8
        [
            'brand' => 'Piranha',
            'model' => '8x8',
            'type' => 'truck',
            'status' => 'active',
            'fuel' => 'diesel',
            'price' => 1000000,
            'image' => 'truck.jpeg',
            'description' => 'Armored personnel carrier',
            'quantity' => 5,
        ],

    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear las armas predefinidas con sus cantidades específicas
        foreach ($this->predefinedVehicles as $vehicleData) {
            $quantity = $vehicleData['quantity'];
            unset($vehicleData['quantity']); // Removemos quantity ya que no es parte del modelo

            for ($i = 0; $i < $quantity; $i++) {
                Vehicle::factory()->create([
                    ...$vehicleData,
                    'weapon_id' => Weapon::doesntHave('commander')->pluck('id')->random(),
                ]);
            }
        }

        // Crear algunas armas aleatorias adicionales usando el factory directamente
        // Weapon::factory(50)->create(); // Crear 50 armas aleatorias adicionales
    }
}

<?php

namespace Database\Seeders;

use App\Models\Weapon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WeaponSeeder extends Seeder
{
    protected $predefinedWeapons = [
        // Pistolas
        [
            'brand' => 'Glock',
            'model' => '17',
            'caliber' => '9mm',
            'type' => 'pistol',
            'action' => 'semi-automatic',
            'status' => 'active',
            'price' => 599,
            'device-id' => null, // Se generará automáticamente
            'image' => 'weapons/glock17.jpg',
            'description' => 'Standard issue Glock 17 semi-automatic pistol',
            'max-range' => 50,
            'weight' => 0.625,
            'quantity' => 200 // Cuántas copias queremos de esta arma
        ],
        [
            'brand' => 'Beretta',
            'model' => '92FS',
            'caliber' => '9mm',
            'type' => 'pistol',
            'action' => 'semi-automatic',
            'status' => 'active',
            'price' => 649,
            'device-id' => null,
            'image' => 'weapons/beretta92fs.jpg',
            'description' => 'Beretta 92FS service pistol',
            'max-range' => 50,
            'weight' => 0.95,
            'quantity' => 500
        ],
        // Rifles de asalto
        [
            'brand' => 'Colt',
            'model' => 'M4A1',
            'caliber' => '5.56mm',
            'type' => 'rifle',
            'action' => 'automatic',
            'status' => 'active',
            'price' => 1299,
            'device-id' => null,
            'image' => 'weapons/m4a1.jpg',
            'description' => 'M4A1 carbine standard issue rifle',
            'max-range' => 500,
            'weight' => 2.88,
            'quantity' => 200
        ],
        [
            'brand' => 'FN Herstal',
            'model' => 'SCAR-H',
            'caliber' => '7.62mm',
            'type' => 'rifle',
            'action' => 'automatic',
            'status' => 'active',
            'price' => 2899,
            'device-id' => null,
            'image' => 'weapons/scar-h.jpg',
            'description' => 'Special Operations Forces Combat Assault Rifle',
            'max-range' => 600,
            'weight' => 3.72,
            'quantity' => 300
        ],
        // Ametralladoras
        [
            'brand' => 'FN Herstal',
            'model' => 'M249 SAW',
            'caliber' => '5.56mm',
            'type' => 'machine gun',
            'action' => 'automatic',
            'status' => 'active',
            'price' => 4599,
            'device-id' => null,
            'image' => 'weapons/m249.jpg',
            'description' => 'Squad Automatic Weapon light machine gun',
            'max-range' => 800,
            'weight' => 7.5,
            'quantity' => 120
        ],
        // Rifles de francotirador
        [
            'brand' => 'Accuracy International',
            'model' => 'AWM',
            'caliber' => '7.62mm',
            'type' => 'sniper rifle',
            'action' => 'non-automatic',
            'status' => 'active',
            'price' => 5999,
            'device-id' => null,
            'image' => 'weapons/awm.jpg',
            'description' => 'Arctic Warfare Magnum sniper rifle',
            'max-range' => 1100,
            'weight' => 6.5,
            'quantity' => 50
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear las armas predefinidas con sus cantidades específicas
        foreach ($this->predefinedWeapons as $weaponData) {
            $quantity = $weaponData['quantity'];
            unset($weaponData['quantity']); // Removemos quantity ya que no es parte del modelo

            for ($i = 0; $i < $quantity; $i++) {
                Weapon::factory()->create([
                    ...$weaponData,
                    'device-id' => Str::uuid(), // Generamos un UUID único para cada arma
                ]);
            }
        }

        // Crear algunas armas aleatorias adicionales usando el factory directamente
       // Weapon::factory(50)->create(); // Crear 50 armas aleatorias adicionales
    }
}

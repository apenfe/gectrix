<?php

namespace Database\Seeders;

use App\Models\Personal\SoldierVehicle;
use App\Models\Personal\Squad;
use App\Models\Personal\Vehicle;
use Illuminate\Database\Seeder;

class SoldierVehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seleccionar 30 squads
        $squads = Squad::all()->take(Vehicle::all()->count());
        $vehicles = Vehicle::all();

        // recorrer todos los squads y asignar su id al vehículo
        for ($i = 0; $i < Vehicle::all()->count(); $i++) {
            $vehicle = $vehicles->get($i);
            $squad = $squads->get($i);
            // asignar id de la escuadra al vehículo
            $vehicle->squad_id = $squad->id;
            $vehicle->save();
        }

        $idVehicle = 1;
        // recorrer los squads y obtener los soldados
        foreach ($squads as $squad) {
            $soldiers = $squad->soldiers;

            // recorrer los soldados y asignarlos al vehículo
            foreach ($soldiers as $soldier) {
                SoldierVehicle::factory()->create([
                    'soldier_id' => $soldier->id,
                    'vehicle_id' => $idVehicle,
                    'assigned_at' => now(),
                    'unassigned_at' => null,
                ]);
            }

            $idVehicle++;

        }

    }
}

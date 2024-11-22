<?php

namespace Database\Seeders;

use App\Models\Battalion;
use App\Models\Brigade;
use App\Models\Commander;
use App\Models\Company;
use App\Models\Platoon;
use App\Models\Regiment;
use App\Models\Section;
use App\Models\Soldier;
use App\Models\Squad;
use App\Models\User;

use App\Models\Vehicle;
use App\Models\Weapon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // usuarios
        $this->call(UserSeeder::class);

        // armas
        $this->call(WeaponSeeder::class);

        // Crear comandantes
        $this->call(CommanderSeeder::class);

        // Crear vehículos
        $this->call(VehicleSeeder::class);

        // Crear estructura militar jerárquica
        // Brigadas
        $this->call(BrigadeSeeder::class);

        // Regimientos
        $this->call(RegimentSeeder::class);

        // Batallones
        $this->call(BattalionSeeder::class);

        // Compañías
        $this->call(CompanySeeder::class);

        // Secciones
        $this->call(SectionSeeder::class);

        // Pelotones
        $this->call(PlatoonSeeder::class);

        // Escuadras
        $this->call(SquadSeeder::class);

        // Crear soldados
        $this->call(SoldierSeeder::class);

    }
}

<?php

namespace Database\Seeders;

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

        // asignar soldados a los vehículos
        $this->call(SoldierVehicleSeeder::class);

        // crear alertas
        $this->call(AlertSeeder::class);

        // crear objetivos
        $this->call(TargetSeeder::class);

    }
}

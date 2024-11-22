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
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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



        // armas para vehículos
        $vehiclesWeapons = Weapon::factory(20)->create();

        // Crear vehículos
        foreach ($vehiclesWeapons as $weapon) {
            Vehicle::factory()->create([
                'weapon_id' => $weapon->id
            ]);
        }

        // Crear estructura militar jerárquica
        // Brigadas
        Brigade::factory(1)->create([
            'commander_id' => Commander::all()->random()->id
        ]);

        // Regimientos
        $brigades = Brigade::all();
        foreach ($brigades as $brigade) {
            Regiment::factory(2)->create([
                'brigade_id' => $brigade->id,
                'commander_id' => Commander::all()->random()->id
            ]);
        }

        // Batallones
        $regiments = Regiment::all();
        foreach ($regiments as $regiment) {
            Battalion::factory(2)->create([
                'regiment_id' => $regiment->id,
                'commander_id' => Commander::all()->random()->id
            ]);
        }

        // Batallones
        $battalions = Battalion::all();
        foreach ($battalions as $battalion) {
            Company::factory(2)->create([
                'battalion_id' => $battalion->id,
                'commander_id' => Commander::all()->random()->id
            ]);
        }

        // Secciones
        $companies = Company::all();
        foreach ($companies as $company) {
            Section::factory(2)->create([
                'company_id' => $company->id,
                'commander_id' => Commander::all()->random()->id
            ]);
        }

        // Pelotones
        $sections = Section::all();
        foreach ($sections as $section) {
            Platoon::factory(2)->create([
                'section_id' => $section->id,
                'commander_id' => Commander::all()->random()->id
            ]);
        }

        // Escuadras
        $platoons = Platoon::all();
        foreach ($platoons as $platoon) {
            Squad::factory(2)->create([
                'platoon_id' => $platoon->id,
                'commander_id' => Commander::all()->random()->id
            ]);
        }

        //armas para soldados
        $soldierWeapons = Weapon::factory(500)->create();

        // Soldados
        $squads = Squad::all();
        foreach ($squads as $squad) {
            Soldier::factory(10)->create([
                'squad_id' => $squad->id,
                'weapon_id' => $soldierWeapons->random()->id
            ]);
        }

    }
}

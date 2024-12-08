<?php

use App\Models\Alert;
use App\Models\Battalion;
use App\Models\Brigade;
use App\Models\Commander;
use App\Models\Company;
use App\Models\Platoon;
use App\Models\Regiment;
use App\Models\Section;
use App\Models\Soldier;
use App\Models\Squad;
use App\Models\Strategic;
use App\Models\Target;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Weapon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('gives back successful response for dashboard', function () {

    $user = User::factory()->create();
    $this->actingAs($user);

    get(route('dashboard'))
        ->assertOk();
});

it('gives back successful response for personal', function () {

    $user = User::factory()->create();
    $this->actingAs($user);

    Weapon::factory()->count(10)->create();

    Commander::factory(['weapon_id' => 1])->create();
    Commander::factory(['weapon_id' => 2])->create();
    Commander::factory(['weapon_id' => 3])->create();
    Commander::factory(['weapon_id' => 4])->create();
    Commander::factory(['weapon_id' => 5])->create();
    Commander::factory(['weapon_id' => 6])->create();
    Commander::factory(['weapon_id' => 7])->create();

    Brigade::factory(['commander_id' => 1])->create();
    Regiment::factory(['brigade_id' => 1, 'commander_id' => 2])->create();
    Battalion::factory(['regiment_id' => 1, 'commander_id' => 3])->create();
    Company::factory(['battalion_id' => 1, 'commander_id' => 4])->create();
    Section::factory(['company_id' => 1, 'commander_id' => 5])->create();
    Platoon::factory(['section_id' => 1, 'commander_id' => 6])->create();
    Squad::factory(['platoon_id' => 1, 'commander_id' => 7])->create();

    Soldier::factory([ 'squad_id' => 1, 'weapon_id' => 8])->create();
    Soldier::factory([ 'squad_id' => 1, 'weapon_id' => 9])->create();
    Soldier::factory([ 'squad_id' => 1, 'weapon_id' => 10])->create();

    Vehicle::factory()->count(1)->create();

    get(route('personal.index'))
        ->assertOk();
});

it('gives back successful response for alerts', function () {

    $user = User::factory()->create();
    $this->actingAs($user);

    Alert::factory()->count(3)->create();
    Target::factory()->count(3)->create();
    Strategic::factory()->count(3)->create();

    get(route('early-warning'))
        ->assertOk();
});

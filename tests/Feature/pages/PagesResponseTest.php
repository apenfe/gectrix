<?php

use App\Models\EarlyWarning\Alert;
use App\Models\EarlyWarning\Target;
use App\Models\Personal\Battalion;
use App\Models\Personal\Brigade;
use App\Models\Personal\Commander;
use App\Models\Personal\Company;
use App\Models\Personal\Platoon;
use App\Models\Personal\Regiment;
use App\Models\Personal\Section;
use App\Models\Personal\Soldier;
use App\Models\Personal\Squad;
use App\Models\Personal\Vehicle;
use App\Models\Personal\Weapon;
use App\Models\User;
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

    Soldier::factory(['squad_id' => 1, 'weapon_id' => 8])->create();
    Soldier::factory(['squad_id' => 1, 'weapon_id' => 9])->create();
    Soldier::factory(['squad_id' => 1, 'weapon_id' => 10])->create();

    Vehicle::factory()->count(1)->create();

    get(route('personal.index'))
        ->assertOk();
});

it('gives back successful response for alerts', function () {

    $user = User::factory()->create();
    $this->actingAs($user);

    Alert::factory()->count(3)->create();
    Target::factory()->count(3)->create();

    get(route('early-warning'))
        ->assertOk();
});

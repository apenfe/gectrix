<?php

use App\Models\EarlyWarning\Alert;
use App\Models\EarlyWarning\Target;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('shows alerts overview', function () {
    // arrange
    $firstAlert = Alert::factory()->create(['danger_level' => 'high']);
    $secondAlert = Alert::factory()->create(['danger_level' => 'medium']);
    $thirdAlert = Alert::factory()->create(['danger_level' => 'low']);

    $user = User::factory()->create();
    $this->actingAs($user);
    // act
    $this->assertAuthenticated(); // Verifica que el usuario está autenticado

    // act
    get(route('early-warning'))
        ->assertOk()
        ->assertSeeText([
            $firstAlert->danger_level,
            $secondAlert->danger_level,
            $thirdAlert->danger_level,
        ]);
});

it('shows no alerts if no alerts in db', function () {
    // arrange
    $user = User::factory()->create();
    $this->actingAs($user);
    // act
    $this->assertAuthenticated(); // Verifica que el usuario está autenticado

    get(route('early-warning'))
        ->assertOk()
        ->assertSeeText([
            'No hay alertas',
        ]);
});

it('shows targets overview', function () {
    // arrange
    $firsTarget = Target::factory(['name' => 'hola'])->create();
    $secondTarget = Target::factory()->create();
    $thirdTarget = Target::factory()->create();

    $user = User::factory()->create();
    $this->actingAs($user);
    // act
    $this->assertAuthenticated(); // Verifica que el usuario está autenticado
    get(route('early-warning'))
        ->assertOk()
        ->assertSeeText([
            $firsTarget->name,
            $secondTarget->name,
            $thirdTarget->name,
        ]);
});

it('shows no targets if no targets in db', function () {
    // arrange
    $user = User::factory()->create();
    $this->actingAs($user);
    // act
    $this->assertAuthenticated(); // Verifica que el usuario está autenticado

    get(route('early-warning'))
        ->assertOk()
        ->assertSeeText([
            'No hay Objetivos',
        ]);
});

<?php

use App\Models\EarlyWarning\Target;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

it('shows NO targets if user is auth and role is admin', function () {
    // arrange
    $admin = User::factory()->create(['role' => 'admin']);
    $this->actingAs($admin);

    // act
    $response = $this->getJson('/api/v1/targets');

    // assert
    // COMPROBAR QUE SE RECIBE UN JSON Y QUE EL STATUS ES 200
    $response->assertJson(['message' => 'No active targets']);
    $response->assertStatus(200);
});

it('shows all targets if user is auth and role is admin', function () {
    // arrange
    $admin = User::factory()->create(['role' => 'admin']);
    $this->actingAs($admin);

    // crear 3 targets
    $targets = Target::factory()->count(3)->create();

    // act
    $response = $this->getJson('/api/v1/targets');

    // assert
    // COMPROBAR QUE SE RECIBE UN JSON Y QUE EL STATUS ES 200
    $response->assertJson(['message' => '3 active targets']);
    $response->assertJsonCount(3, 'data');
    $response->assertStatus(200);
});

it('shows NO targets if user is auth and role is user', function () {
    // arrange
    $user = User::factory()->create(['role' => 'user']);
    $this->actingAs($user);

    // act
    $response = $this->getJson('/api/v1/targets');

    // assert
    // COMPROBAR QUE SE RECIBE UN JSON Y QUE EL STATUS ES 200
    $response->assertJson(['message' => 'Unauthorized']);
    $response->assertStatus(403);
});

it('shows NO targets if user is NOT auth', function () {
    // act
    $response = $this->getJson('/api/v1/targets');

    // assert
    // COMPROBAR QUE SE RECIBE UN JSON Y QUE EL STATUS ES 200
    $response->assertJson(['message' => 'Unauthenticated.']);
    $response->assertStatus(401);
});

it('can delete a target if user is auth and role is admin', function () {
    // arrange
    $admin = User::factory()->create(['role' => 'admin']);
    $this->actingAs($admin);

    // crear un target
    $target = Target::factory()->create();

    // act
    $response = $this->deleteJson('/api/v1/targets/'.$target->id);

    // assert
    // COMPROBAR QUE SE RECIBE UN JSON Y QUE EL STATUS ES 200
    $response->assertJson(['message' => 'Target deleted']);
    $response->assertStatus(200);
});

it('can NOT delete a target if user is auth and role is user', function () {
    // arrange
    $user = User::factory()->create(['role' => 'user']);
    $this->actingAs($user);

    // crear un target
    $target = Target::factory()->create();

    // act
    $response = $this->deleteJson('/api/v1/targets/'.$target->id);

    // assert
    // COMPROBAR QUE SE RECIBE UN JSON Y QUE EL STATUS ES 200
    $response->assertJson(['message' => 'Unauthorized']);
    $response->assertStatus(403);
});

it('can create a target if user is auth and role is admin', function () {
    // arrange
    Storage::fake('public');

    $admin = User::factory()->create(['role' => 'admin']);
    $this->actingAs($admin);

    $image = UploadedFile::fake()->image('imagen.png');
    $logo = UploadedFile::fake()->image('logo.png');

    $targetData = [
        'priority' => 'low',
        'status' => true,
        'name' => 'Objetivo 1',
        'description' => 'Descripción del objetivo 1',
        'latitude' => 40.416775,
        'longitude' => -3.703790,
        'radius' => 10,
        'setup_date' => now()->toDateTimeString(),
        'deactivation_date' => now()->addDay()->toDateTimeString(),
        'action' => 'attack',
        'image' => $image,
        'logo' => $logo,
    ];

    // act
    $response = $this->postJson('/api/v1/targets', $targetData);

    // assert
    $response->assertStatus(201);

    // Verificar que el target se creó en la base de datos
    $this->assertDatabaseHas('targets', [
        'name' => 'Objetivo 1',
        'action' => 'attack',
        'priority' => 'low',
    ]);
});

it('can edit a target if user is auth and role is admin', function () {
    // arrange
    Storage::fake('public');

    $admin = User::factory()->create(['role' => 'admin']);
    $this->actingAs($admin);

    $target = Target::factory()->create();

    $image = UploadedFile::fake()->image('imagen.png');
    $logo = UploadedFile::fake()->image('logo.png');

    $targetData = [
        'priority' => 'high',
        'status' => false,
        'name' => 'Objetivo 2',
        'description' => 'Descripción del objetivo 2',
        'latitude' => 40.416775,
        'longitude' => -3.703790,
        'radius' => 10,
        'setup_date' => now()->toDateTimeString(),
        'deactivation_date' => now()->addDay()->toDateTimeString(),
        'action' => 'attack',
        'image' => $image,
        'logo' => $logo,
    ];

    // act
    $response = $this->putJson('/api/v1/targets/'.$target->id, $targetData);

    // assert
    $response->assertStatus(200);

    // Verificar que el target se editó en la base de datos
    $this->assertDatabaseHas('targets', [
        'name' => 'Objetivo 2',
        'action' => 'attack',
        'priority' => 'high',
    ]);
});

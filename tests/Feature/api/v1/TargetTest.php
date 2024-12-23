<?php

use App\Models\Target;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

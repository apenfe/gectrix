<?php

use App\Models\Alert;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('everybody can get all active alerts', function () {
    // arrange
    // una terminada ayer
    $alertOne = Alert::factory(['start_date' => Carbon::yesterday(), 'end_date' => Carbon::yesterday()])->create();
    // una terminada hoy
    $alertTwo = Alert::factory(['start_date' => Carbon::today(), 'end_date' => Carbon::tomorrow()])->create();
    // una terminada mañana
    $alertThree = Alert::factory(['start_date' => Carbon::yesterday(), 'end_date' => Carbon::tomorrow()])->create();

    // act
    $response = $this->get('/api/v1/alerts');

    // assert
    $response->assertStatus(200);
    $response->assertJsonCount(2);
});

it('shows to everybody no alerts if no active alerts', function () {
    // arrange
    // una terminada ayer
    $alertOne = Alert::factory(['start_date' => Carbon::yesterday(), 'end_date' => Carbon::yesterday()])->create();
    // una terminada hoy
    $alertTwo = Alert::factory(['start_date' => Carbon::today(), 'end_date' => Carbon::yesterday()])->create();
    // una terminada mañana
    $alertThree = Alert::factory(['start_date' => Carbon::yesterday(), 'end_date' => Carbon::yesterday()])->create();

    // act
    $response = $this->get('/api/v1/alerts');

    // assert
    $response->assertStatus(200);
    // No active alerts
    $response->assertJson(['message'=>'No active alerts']);
});

it('everybody can get an alert', function () {
    // arrange
    $alert = Alert::factory()->create();
    // act
    $response = $this->get('/api/v1/alerts/'.$alert->id);
    // assert
    $response->assertStatus(200);
    $response->assertJson(['data' => $alert->toArray()]);
});

it('only token can-create can create an alert', function () {
    // arrange
    // crear un usuario con token can-create
    $user = User::factory()->create();
    $token = $user->createToken('TestToken', ['can-create'])->plainTextToken;

    $alertData = [
        'type' => 'air-strike',
        'latitude' => 40.7128,
        'longitude' => -74.0060,
        'radius' => 10,
        'start_date' => Carbon::now(),
        'end_date' => Carbon::tomorrow(),
        'description' => 'Test alert',
        'danger_level' => 'high'
    ];

    // act
    $response = $this->postJson('/api/v1/alerts', $alertData, ['Authorization' => 'Bearer ' . $token]);

    // assert
    $response->assertStatus(201);
    $this->assertDatabaseHas('alerts', ['description' => 'Test alert']);
});

it('only token can-update can update an alert', function () {
    // crear un usuario con token can-create
    $user = User::factory()->create();
    $token = $user->createToken('TestToken', ['can-update'])->plainTextToken;

    // crear una alerta existente
    $alert = Alert::factory()->create();

    $updatedAlertData = [
        'type' => 'air-strike',
        'latitude' => 40.7128,
        'longitude' => -74.0060,
        'radius' => 15,
        'start_date' => Carbon::now(),
        'end_date' => Carbon::tomorrow(),
        'description' => 'Updated test alert',
        'danger_level' => 'medium'
    ];

    // act
    $response = $this->putJson('/api/v1/alerts/'. $alert->id, $updatedAlertData, ['Authorization' => 'Bearer ' . $token]);

    // assert
    $response->assertStatus(201);
    $this->assertDatabaseHas('alerts', ['description' => 'Updated test alert']);
});

it('only token can-delete can delete an alert', function () {
    // crear un usuario con token can-delete
    $user = User::factory()->create();
    $token = $user->createToken('TestToken', ['can-delete'])->plainTextToken;

    // crear una alerta existente
    $alert = Alert::factory()->create();

    // act
    $response = $this->deleteJson('/api/v1/alerts/' . $alert->id, [], ['Authorization' => 'Bearer ' . $token]);

    // assert
    $response->assertStatus(204);
    $this->assertDatabaseMissing('alerts', ['id' => $alert->id]);

});

it('everybody can get an alert given a position if position is in area', function () {
    // arrange
    $alert = Alert::factory()->create();

    $position = [
        'latitude' => $alert->latitude,
        'longitude' => $alert->longitude
    ];

    // act
    $response = $this->postJson('/api/v1/alerts/position', $position);

    // assert
    // response is 200
    // response has alert data
    // assert
    $response->assertStatus(200)
        ->assertJsonStructure([
            'data',
            'message'
        ])
        ->assertJson([
            'message' => 'Alert in this position',
            'data' => [$alert->toArray()]  // Note que data es un array de alertas
        ]);

});

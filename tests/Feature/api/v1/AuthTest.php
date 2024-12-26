<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('gives a basic alerts token to authenticated users', function () {
    // arrange
    $user = User::factory()->create();
    $data = ['email' => $user->email, 'password' => 'password'];

    // act
    $response = $this->postJson('/api/v1/loginapi', $data);

    // assert
    $response->assertStatus(200);
    $response->assertJsonStructure(['message', 'token']);
    $response->assertJson(['message' => 'Authenticated']);
});

it('can change my own token if i am the admin', function () {
    // arrange
    $admin = User::factory()->create(['role' => 'admin']);
    $data = ['email' => $admin->email, 'password' => 'password', 'token' => 'alerts'];

    // act
    $response = $this->actingAs($admin)->postJson('/api/v1/change-token', $data);

    // assert
    $response->assertStatus(200);
    $response->assertJsonStructure(['message', 'token']);
    $response->assertJson(['message' => 'Token changed']);

});

it('can change peoples tokens if i am the admin', function () {
    // arrange
    $admin = User::factory()->create(['role' => 'admin']);

    $user = User::factory()->create();
    $data = ['my_email' => $admin->email, 'my_password' => 'password', 'email' => $user->email, 'token' => 'alerts'];

    // act
    $response = $this->actingAs($admin)->postJson('/api/v1/change-tokens', $data);

    // assert
    $response->assertStatus(200);
    $response->assertJsonStructure(['message', 'token']);
    $response->assertJson(['message' => 'Token changed']);

});

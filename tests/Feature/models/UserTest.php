<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('says true if user is admin', function () {
    // arrange
    //crear un usuario con el rol de admin
    $admin = User::factory()->create(['role' => 'admin']);
    $this->actingAs($admin);

    //crear un usuario con el rol de user
    $user = User::factory()->create(['role' => 'user']);
    $this->actingAs($user);

    // act
    //llamar a la función isAdmin del modelo User
    $responseAdmin = $admin->isAdmin();
    $responseUser = $user->isAdmin();

    // assert
    //verificar que la respuesta sea true
    $this->assertTrue($responseAdmin);
    //verificar que la respuesta sea false
    $this->assertFalse($responseUser);
});

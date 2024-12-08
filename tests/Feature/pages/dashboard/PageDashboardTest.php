<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows links to all modules created', function () {

    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('dashboard'));

    $response->assertSee('Dashboard');
    $response->assertSee('Personal');
    $response->assertSee('Alerts');

});

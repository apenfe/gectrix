<?php

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

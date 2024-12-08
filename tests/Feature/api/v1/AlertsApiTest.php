<?php

use App\Models\Alert;
use App\Models\Target;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('everybody can get all alerts', function () {
    // arrange
    // Create 3 alerts
    $alerts = Alert::factory()->count(3)->create();

    // act
    $response = $this->get('/api/v1/alerts');

    // assert
    $response->assertStatus(200);
    $response->assertJsonCount(3);
});

it('everybody can get a target', function () {
    // arrange

    // act

    // assert
});

it('only token can-create can create a target', function () {
    // arrange

    // act

    // assert
});

it('only token can-update can update a target', function () {
    // arrange

    // act

    // assert
});

it('only token can-delete can delete a target', function () {
    // arrange

    // act

    // assert
});

it('everybody can get all alerts given a position and a radius', function () {
    // arrange

    // act

    // assert
});

it('everybody can get an alert given a position', function () {
    // arrange

    // act

    // assert
});

<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('Api/V1 redirect to api_v1', function () {
    $response = $this->get('/Api/V1');
    $response->assertRedirect('/Api/V1/api_v1');
    $response->assertStatus(301);
});

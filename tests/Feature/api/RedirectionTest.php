<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('Api/V1 redirect to api_v1', function () {
    $response = $this->get('/api/v1/alerts');
    $response->assertStatus(200);
});

<?php

use App\Models\EarlyWarning\Alert;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('calculates distance from alert position to other position given', function () {
    // arrange
    $lat1 = 40.416775;
    $lon1 = -3.703790;

    $lat2 = 40.416500;
    $lon2 = -3.703500;

    $expectedDistance = 0.039;
    // act
    $distance = Alert::calcularDistancia($lat1, $lon1, $lat2, $lon2);

    // assert
    $this->assertEqualsWithDelta($expectedDistance, $distance, 0.001);
});

it('calculates distances correctly for various scenarios', function () {
    // Test case 1: Short distance (Madrid)
    $distance1 = Alert::calcularDistancia(40.416775, -3.703790, 40.416500, -3.703500);
    $this->assertEqualsWithDelta(0.039, $distance1, 0.001);

    $distance2 = Alert::calcularDistancia(40.416775, -3.703790, 40.420000, -3.710000);
    $this->assertEqualsWithDelta(0.636, $distance2, 0.001);  // Ajustado al valor real

    // Test case 3: Same point (should be 0)
    $distance3 = Alert::calcularDistancia(40.416775, -3.703790, 40.416775, -3.703790);
    $this->assertEquals(0.0, $distance3);

    // Test case 4: Antipodes (should be approximately 20,000 km)
    $distance4 = Alert::calcularDistancia(40.416775, -3.703790, -40.416775, 176.296210);
    $this->assertEqualsWithDelta(20000, $distance4, 100);
});

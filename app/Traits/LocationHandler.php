<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait LocationHandler
{
    public function spain() {
        // generar una latitud y longitud aleatoria en España
        $latitude = 40.4167754 + (mt_rand(-4500, 4500) / 1000);
        $longitude = -3.7037902 + (mt_rand(-5880, 5880) / 1000);

        return [
            'latitude' => $latitude,
            'longitude' => $longitude,
        ];
    }
}

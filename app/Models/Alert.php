<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model {
    use HasFactory;

    protected $fillable = [
        'type',
        'latitude',
        'longitude',
        'radius',
        'start_date',
        'end_date',
        'description',
        'danger_level'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    public static function calcularDistancia($lat1, $lon1, $lat2, $lon2)
    {
        $radioTierra = 6371; // Radio de la Tierra en kilómetros

        // Convertir de grados a radianes
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);

        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;

        $a = sin($dlat / 2) * sin($dlat / 2) +
            cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distancia = $radioTierra * $c;

        return $distancia;
    }
}

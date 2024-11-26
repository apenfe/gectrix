<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleFactory> */
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'type',
        'status',
        'seats',
        'liters',
        'liters_per_100km',
        'fuel',
        'liters_reserve',
        'price',
        'image',
        'description',
        'weight',
        'latitude',
        'longitude',
        'weapon_id',
        'squad_id',
    ];

    public function weapon()
    {
        return $this->hasOne(Weapon::class);
    }

    public function squad()
    {
        return $this->belongsTo(Squad::class);
    }

    public function soldiers() {
        return $this->hasMany(Soldier::class, 'soldiers_vehicles');
    }
}

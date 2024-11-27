<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    /** @use HasFactory<\Database\Factories\WeaponFactory> */
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'caliber',
        'type',
        'action',
        'status',
        'price',
        'deviceId',
        'image',
        'description',
        'maxRange',
        'weight',
        'latitude',
        'longitude',
    ];

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }

    public function soldier()
    {
        return $this->hasOne(Soldier::class);
    }

    public function commander()
    {
        return $this->hasOne(Commander::class);
    }

}

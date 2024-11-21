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
        'device-id',
        'image',
        'description',
        'max-range',
        'weight',
        'latitude',
        'longitude',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model {
    use HasFactory;

    protected $fillable = [
        'priority',
        'status',
        'name',
        'description',
        'latitude',
        'longitude',
        'radius',
        'image',
        'logo',
        'setup_date',
        'deactivation_date',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}

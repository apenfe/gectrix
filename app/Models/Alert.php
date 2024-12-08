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
        'danger_level',
    ];
}

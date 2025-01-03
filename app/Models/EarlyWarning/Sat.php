<?php

namespace App\Models\EarlyWarning;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sat extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'satellite',
        'cloud_coverage',
        'latitude_north',
        'latitude_south',
        'longitude_east',
        'longitude_west',
        'target_id',
        'image_route',
    ];

    public function target()
    {
        return $this->belongsTo(Target::class);
    }
}

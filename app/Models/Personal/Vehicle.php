<?php

namespace App\Models\Personal;

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
        return $this->belongsTo(Weapon::class, 'weapon_id');
    }

    public function squad()
    {
        return $this->belongsTo(Squad::class);
    }

    public function soldiers()
    {
        return $this->belongsToMany(Soldier::class, 'soldiers_vehicles');
    }

    // Scopes
    public function scopeBrand($query, $brand)
    {
        if ($brand) {
            return $query->where('brand', 'like', "%$brand%");
        }
        return $query;
    }

    public function scopeModel($query, $model)
    {
        if ($model) {
            return $query->where('model', 'like', "%$model%");
        }
        return $query;
    }

    public function scopeType($query, $type)
    {
        if ($type) {
            return $query->where('type', $type);
        }
        return $query;
    }

    public function scopeStatus($query, $status)
    {
        if ($status) {
            return $query->where('status', $status);
        }
        return $query;
    }
}

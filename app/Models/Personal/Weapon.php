<?php

namespace App\Models\Personal;

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
        return $this->hasOne(Vehicle::class, 'weapon_id');
    }

    public function soldier()
    {
        return $this->hasOne(Soldier::class, 'weapon_id');
    }

    public function commander()
    {
        return $this->hasOne(Commander::class, 'weapon_id');
    }

    // Scopes
    public function scopeBrand($query, $brand)
    {
        if ($brand) {
            return $query->where('brand', 'like', '%'.$brand.'%');
        }
        return $query;
    }

    public function scopeDescription($query, $description)
    {
        if ($description) {
            return $query->where('description', 'like', '%'.$description.'%');
        }
        return $query;
    }

    public function scopeAction($query, $action)
    {
        if ($action) {
            return $query->where('action', $action);
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

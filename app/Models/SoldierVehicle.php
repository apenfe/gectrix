<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldierVehicle extends Model
{
    use HasFactory;

    protected $table = 'soldiers_vehicles';

    protected $fillable = [
        'vehicle_id',
        'soldier_id',
        'role',
        'assigned_at',
        'unassigned_at',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function soldier()
    {
        return $this->belongsTo(Soldier::class);
    }
}

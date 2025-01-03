<?php

namespace App\Models\Personal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soldier extends Model
{
    /** @use HasFactory<\Database\Factories\Personal\SoldierFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'tim',
        'rank',
        'rank_image',
        'scale',
        'specialty',
        'status',
        'photo',
        'salary',
        'date_of_birth',
        'date_of_death',
        'date_of_enlistment',
        'date_of_demobilization',
        'squad_id',
        'weapon_id',
    ];

    public function squad()
    {
        return $this->belongsTo(Squad::class);
    }

    public function weapon()
    {
        return $this->belongsTo(Weapon::class, 'weapon_id');
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'soldiers_vehicles');
    }

    public function getArmyAttribute()
    {
        return $this->squad?->platoon?->section?->company?->battalion?->brigade?->army;
    }
}

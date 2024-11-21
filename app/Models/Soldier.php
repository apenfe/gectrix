<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soldier extends Model
{
    /** @use HasFactory<\Database\Factories\SoldierFactory> */
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
        'age',
        'scale',
        'specialty',
        'status',
        'photo',
        'salary',
        'date_of_birth',
        'date_of_death',
        'date_of_enlistment',
        'date_of_demobilization',
        'years_of_service',
        'squad_id',
        'weapon_id'
    ];

    public function squad()
    {
        return $this->belongsTo(Squad::class);
    }

    public function weapons()
    {
        return $this->hasMany(Weapon::class);
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'soldiers_vehicles');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commander extends Model
{
    /** @use HasFactory<\Database\Factories\CommanderFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'tim',
        'rank',
        'rank_image',
        'scale',
        'specialty',
        'status',
        'email',
        'telephone',
        'photo',
        'salary',
        'date_of_birth',
        'date_of_death',
        'date_of_enlistment',
        'date_of_demobilization',
        'weapon_id',
    ];

    public function weapon()
    {
        return $this->hasOne(Weapon::class);
    }

    public function brigade()
    {
        return $this->hasOne(Brigade::class, 'commander_id');
    }

    public function squad()
    {
        return $this->hasOne(Squad::class, 'commander_id');
    }

    public function battalion()
    {
        return $this->hasOne(Battalion::class, 'commander_id');
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'commander_id');
    }

    public function platoon()
    {
        return $this->hasOne(Platoon::class, 'commander_id');
    }

    public function section()
    {
        return $this->hasOne(Section::class, 'commander_id');
    }

    public function regiment()
    {
        return $this->hasOne(Regiment::class);
    }

}

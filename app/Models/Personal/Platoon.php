<?php

namespace App\Models\Personal;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platoon extends Model
{
    /** @use HasFactory<\Database\Factories\PlatoonFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'max_subordinates',
        'current_subordinates',
        'latitude',
        'longitude',
        'combat_logo',
        'commander_id',
        'section_id',
    ];

    public function commander()
    {
        return $this->belongsTo(User::class, 'commander_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function squads()
    {
        return $this->hasMany(Squad::class);
    }
}

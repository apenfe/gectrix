<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regiment extends Model
{
    /** @use HasFactory<\Database\Factories\RegimentFactory> */
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
        'brigade_id',
    ];

    public function commander()
    {
        return $this->belongsTo(User::class, 'commander_id');
    }

    public function brigade()
    {
        return $this->belongsTo(Brigade::class, 'brigade_id');
    }

    public function battalions()
    {
        return $this->hasMany(Battalion::class);
    }
}

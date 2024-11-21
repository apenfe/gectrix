<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brigade extends Model
{
    /** @use HasFactory<\Database\Factories\BrigadeFactory> */
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'army',
        'status',
        'max_subordinates',
        'current_subordinates',
        'latitude',
        'longitude',
        'combat_logo',
        'unit_emblem',
        'commander_id'
    ];

    public function commander()
    {
        return $this->belongsTo(Commander::class);
    }

    public function regiments()
    {
        return $this->hasMany(Regiment::class);
    }

}

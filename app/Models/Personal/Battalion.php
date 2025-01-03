<?php

namespace App\Models\Personal;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battalion extends Model
{
    /** @use HasFactory<\Database\Factories\Personal\BattalionFactory> */
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
        'regiment_id',
    ];

    public function commander()
    {
        return $this->belongsTo(User::class, 'commander_id');
    }

    public function regiment()
    {
        return $this->belongsTo(Regiment::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}

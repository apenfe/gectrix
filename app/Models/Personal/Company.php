<?php

namespace App\Models\Personal;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\Personal\CompanyFactory> */
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
        'battalion_id',
    ];

    public function commander()
    {
        return $this->belongsTo(User::class, 'commander_id');
    }

    public function battalion()
    {
        return $this->belongsTo(Battalion::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}

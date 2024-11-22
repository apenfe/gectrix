<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    /** @use HasFactory<\Database\Factories\SectionFactory> */
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
        'company_id'
    ];

    public function commander()
    {
        return $this->belongsTo(User::class, 'commander_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function platoons()
    {
        return $this->hasMany(Platoon::class);
    }
}

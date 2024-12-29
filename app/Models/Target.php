<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $fillable = [
        'priority',
        'status',
        'name',
        'description',
        'latitude',
        'longitude',
        'radius',
        'image',
        'logo',
        'setup_date',
        'deactivation_date',
        'action',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function scopePriority($query, $priority)
    {
        if ($priority) {
            return $query->where('priority', $priority);
        }
        return $query;
    }

    public function scopeStatus($query, $status)
    {
        if ($status) {
            return $query->where('status', $status);
        }
        return $query;
    }

    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'like', '%' . $name . '%');
        }
        return $query;
    }

    public function scopeDescription($query, $description)
    {
        if ($description) {
            return $query->where('description', 'like', '%' . $description . '%');
        }
        return $query;
    }

    public function scopeSetupDate($query, $setup_date)
    {
        if ($setup_date) {
            return $query->whereDate('setup_date', $setup_date);
        }
        return $query;
    }

    public function scopeDeactivationDate($query, $deactivation_date)
    {
        if ($deactivation_date) {
            return $query->whereDate('deactivation_date', $deactivation_date);
        }
        return $query;
    }

    public function scopeAction($query, $action)
    {
        if ($action) {
            return $query->where('action', $action);
        }
        return $query;
    }
}

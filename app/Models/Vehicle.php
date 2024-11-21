<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleFactory> */
    use HasFactory;

    /*
     * $table->string('brand');
            $table->string('model');
            $table->enum('type', ['car', 'motorcycle', 'truck', 'bus', 'tank', 'airplane', 'helicopter', 'boat']);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedTinyInteger('seats');
            $table->unsignedTinyInteger('liters');
            $table->unsignedTinyInteger('liters_per_100km');
            $table->enum('fuel', ['gasoline', 'diesel']);
            $table->unsignedTinyInteger('liters_reserve');
            $table->unsignedInteger('price')->default(0);
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->decimal('weight', 5, 2);
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->foreignId('weapon_id')->constrained();
            $table->foreignId('squad_id')->constrained();
     */

    protected $fillable = [
        'brand',
        'model',
        'type',
        'status',
        'seats',
        'liters',
        'liters_per_100km',
        'fuel',
        'liters_reserve',
        'price',
        'image',
        'description',
        'weight',
        'latitude',
        'longitude',
        'weapon_id',
        'squad_id',
    ];

    public function weapons()
    {
        return $this->hasMany(Weapon::class);
    }

    public function squad()
    {
        return $this->belongsTo(Squad::class);
    }

    public function soldiers() {
        return $this->belongsToMany(Soldier::class, 'soldier_vehicle');
    }
}

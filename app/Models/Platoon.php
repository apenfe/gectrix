<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platoon extends Model
{
    /** @use HasFactory<\Database\Factories\PlatoonFactory> */
    use HasFactory;

    /*
     * $table->string('name');
            $table->text('description')->nullable();
            $table->enum('status', ['operativa', 'inoperativa'])->default('operativa');
            $table->integer('max_subordinates')->default(2);
            $table->integer('current_subordinates')->default(0);
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('combat_logo'); // por defecto
            $table->foreignId('commander_id')->constrained();
            $table->foreignId('section_id')->constrained();
     */

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
        'section_id'
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

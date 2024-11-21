<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;

    /*
     * $table->string('name');
            $table->text('description')->nullable();
            $table->enum('status', ['operativa', 'inoperativa'])->default('operativa');
            $table->integer('max_subordinates')->default(4);
            $table->integer('current_subordinates')->default(0);
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('combat_logo'); // por defecto
            $table->foreignId('commander_id')->constrained();
            $table->foreignId('battalion_id')->constrained();
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

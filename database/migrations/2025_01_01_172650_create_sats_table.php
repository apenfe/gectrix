<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sats', function (Blueprint $table) {
            $table->id();
            $table->string('image_route');
            $table->date('date');
            $table->enum('satellite', ['sentinel1', 'sentinel2']);
            $table->string('cloud_coverage');
            $table->decimal('latitude_north', 10, 8);
            $table->decimal('latitude_south', 10, 8);
            $table->decimal('longitude_east', 11, 8);
            $table->decimal('longitude_west', 11, 8);
            $table->foreignId('target_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sats');
    }
};

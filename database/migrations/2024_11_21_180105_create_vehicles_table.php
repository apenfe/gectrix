<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->enum('type', ['car', 'truck', 'bus', 'tank', 'helicopter', 'boat']);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedTinyInteger('seats')->default(4);
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
            $table->foreignId('weapon_id')->constrained()->onDelete('cascade');
            $table->foreignId('squad_id')->nullable()->constrained()->onDelete('cascade'); // nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};

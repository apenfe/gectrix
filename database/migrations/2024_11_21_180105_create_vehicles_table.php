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
            $table->enum('type', ['car', 'motorcycle', 'truck', 'bus', 'tank', 'airplane', 'helicopter', 'boat']);
            $table->enum('action', ['one-shot','non-automatic', 'semi-automatic', 'automatic']);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedInteger('price')->default(0);
            $table->string('device-id')->unique();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('max-range');
            $table->decimal('weight', 5, 2);
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
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

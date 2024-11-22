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
        Schema::create('brigades', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('army', ['tierra', 'aire', 'armada', 'general'])->default('tierra');
            $table->enum('status', ['operativa', 'inoperativa'])->default('operativa');
            $table->integer('max_subordinates')->default(4);
            $table->integer('current_subordinates')->default(0);
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('combat_logo')->default('combat_icons/brigade.png');
            $table->string('unit_emblem');
            $table->foreignId('commander_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brigades');
    }
};

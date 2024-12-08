<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['air-strike', 'ground-attack', 'naval-bombardment']);
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->unsignedInteger('radius');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description')->nullable();
            $table->enum('danger_level', ['low', 'medium', 'high']);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('alerts');
    }
};

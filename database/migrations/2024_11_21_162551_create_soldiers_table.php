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
        Schema::create('soldiers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('tim');
            $table->string('rank');
            $table->string('rank_image')->default('default.jpg');
            $table->integer('age');
            $table->string('scale')->default('tropa');
            $table->string('specialty');
            $table->enum('status', ['baja', 'operativo', 'abatido'])->default('operativo');
            $table->string('photo')->default('default.jpg');
            $table->integer('salary');
            $table->date('date_of_birth');
            $table->date('date_of_death')->nullable();
            $table->date('date_of_enlistment');
            $table->date('date_of_demobilization')->nullable();
            $table->integer('years_of_service');
            $table->foreignId('squad_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soldiers');
    }
};

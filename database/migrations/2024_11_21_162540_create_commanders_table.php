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
        Schema::create('commanders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('tim');
            $table->string('rank');
            $table->integer('age');
            $table->enum('scale', ['oficiales', 'suboficiales','tropa'])->default('suboficiales');
            $table->string('specialty');
            $table->enum('status', ['baja', 'operativo', 'abatido'])->default('operativo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commanders');
    }
};

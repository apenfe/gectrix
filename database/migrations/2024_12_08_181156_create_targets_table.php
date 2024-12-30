<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('targets', function (Blueprint $table) {
            $table->id();
            $table->enum('priority', ['low', 'medium', 'high']);
            $table->boolean('status')->default(true);
            $table->string('name');
            $table->string('description');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->unsignedInteger('radius');
            $table->string('image')->nullable();
            $table->string('logo')->nullable();
            $table->date('setup_date');
            $table->date('deactivation_date')->nullable();
            $table->enum('action', ['attack', 'defense', 'reconnaissance']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('targets');
    }
};

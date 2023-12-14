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
        Schema::create('sys', function (Blueprint $table) {
            $table->id();
            $table->integer("base_weather_id")
                ->unique();
            $table->integer("type");
            $table->integer("openweathermap_id");
            $table->string("country");
            $table->integer("sunrise");
            $table->integer("sunset");
            $table->timestamps();
            $table->foreign("base_weather_id")
                ->references('id')
                ->on('base_weather')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sys');
    }
};

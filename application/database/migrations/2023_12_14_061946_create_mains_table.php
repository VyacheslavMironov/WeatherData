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
        Schema::create('mains', function (Blueprint $table) {
            $table->id();
            $table->integer("base_weather_id");
            $table->float("temp");
            $table->float("feels_like");
            $table->float("temp_min");
            $table->float("temp_max");
            $table->integer("pressure");
            $table->integer("humidity");
            $table->integer("sea_level");
            $table->integer("grnd_level");
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
        Schema::dropIfExists('mains');
    }
};

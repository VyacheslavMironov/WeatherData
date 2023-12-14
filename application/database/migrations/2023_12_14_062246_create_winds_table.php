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
        Schema::create('winds', function (Blueprint $table) {
            $table->id();
            $table->integer("base_weather_id");
            $table->float("speed");
            $table->integer("deg");
            $table->float("gust");
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
        Schema::dropIfExists('winds');
    }
};

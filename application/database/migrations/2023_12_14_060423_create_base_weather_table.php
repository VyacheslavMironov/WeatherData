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
        Schema::create('base_weather', function (Blueprint $table) {
            $table->id();
            $table->integer("openweathermap_id")
                ->unique();
            $table->string("name")
                ->unique();
            $table->integer("cod");
            $table->integer("timezone");
            $table->integer("dt");
            $table->integer("visibility");
            $table->string("base");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_weather');
    }
};

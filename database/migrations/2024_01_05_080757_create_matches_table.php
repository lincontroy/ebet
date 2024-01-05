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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('homeTeam')->nullable();
            $table->string('type')->nullable();
            $table->string('awayTeam')->nullable();
            $table->string('team')->nullable();
            $table->string('league')->nullable();
            $table->string('result')->nullable();
            $table->string('odds')->nullable();      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};

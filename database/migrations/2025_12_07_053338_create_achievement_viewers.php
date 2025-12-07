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
        Schema::create('achievement_viewers', function (Blueprint $table) {
            $table->increments('id',11);
            
            // relation
            $table->unsignedInteger('achievement_id');
            $table->foreign("achievement_id")->references('id')->on("achievements");
            
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievement_viewers');
    }
};

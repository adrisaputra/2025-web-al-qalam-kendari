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
        Schema::create('social_viewers', function (Blueprint $table) {
            $table->increments('id',11);
            
            // relation
            $table->unsignedInteger('social_id');
            $table->foreign("social_id")->references('id')->on("socials");
            
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_viewers');
    }
};

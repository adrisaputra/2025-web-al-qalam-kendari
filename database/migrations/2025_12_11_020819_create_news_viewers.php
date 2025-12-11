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
        Schema::create('news_viewers', function (Blueprint $table) {
            $table->increments('id',11);
            
            // relation
            $table->unsignedInteger('news_id');
            $table->foreign("news_id")->references('id')->on("news");
            
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_viewers');
    }
};

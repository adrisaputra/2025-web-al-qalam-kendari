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
        Schema::create('program_viewers', function (Blueprint $table) {
            $table->increments('id',11);
            
            // relation
            $table->unsignedInteger('program_id');
            $table->foreign("program_id")->references('id')->on("programs");
            
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_viewers');
    }
};

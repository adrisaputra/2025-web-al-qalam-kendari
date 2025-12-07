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
        Schema::create('academics', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('title')->nullable();
            $table->string('cover')->nullable();
            $table->string('slug')->nullable();
            $table->text('text')->nullable();
            $table->string('file')->nullable();
            $table->enum('category',['Curriculum','Academic Calendar'])->nullable();
            $table->integer('count_view')->nullable();

            $table->unsignedInteger('work_unit_id');
            $table->foreign("work_unit_id")->references('id')->on("work_units");
            
            $table->unsignedBigInteger('user_id');
            $table->foreign("user_id")->references('id')->on("users");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academics');
    }
};

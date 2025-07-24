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
        Schema::create('class', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['online', 'offline']);
            $table->bigInteger('teacher_id')->unsigned();
            $table->bigInteger('location_id')->unsigned();
            $table->json('day');
            $table->string('time_start');
            $table->string('time_end');
            $table->enum('timezone', ['WIB', 'WITA', 'WIT']);
            $table->string('price');
            $table->string('color');
            $table->text('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class');
    }
};

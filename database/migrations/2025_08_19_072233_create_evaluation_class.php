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
        Schema::create('evaluation_class', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_class_id')->unsigned();
            $table->bigInteger('users_id')->unsigned();
            $table->string('value');
            $table->string('note_value');
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('category_class_id')->references('id')->on('category_class')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation_class');
    }
};

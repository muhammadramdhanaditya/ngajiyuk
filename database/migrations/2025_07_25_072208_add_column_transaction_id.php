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
        Schema::table('user_class', function (Blueprint $table) {
            $table->bigInteger('transaction_id')->unsigned()->default(false)->after('class_id');
            $table->foreign('transaction_id')->references('id')->on('transaction')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_class', function (Blueprint $table) {
            //
        });
    }
};

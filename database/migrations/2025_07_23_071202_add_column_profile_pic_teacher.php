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
        Schema::table('teacher', function (Blueprint $table) {
            Schema::table('teacher', function (Illuminate\Database\Schema\Blueprint $table) {
                $table->string('profile_photo_url')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teacher', function (Blueprint $table) {
            Schema::table('teacher', function (Illuminate\Database\Schema\Blueprint $table) {
                $table->dropColumn('profile_photo_url');
            });
        });
    }
};

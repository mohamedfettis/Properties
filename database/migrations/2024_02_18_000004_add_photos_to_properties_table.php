<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->string('main_photo')->nullable();
            $table->string('secondary_photo_1')->nullable();
            $table->string('secondary_photo_2')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('main_photo');
            $table->dropColumn('secondary_photo_1');
            $table->dropColumn('secondary_photo_2');
        });
    }
};

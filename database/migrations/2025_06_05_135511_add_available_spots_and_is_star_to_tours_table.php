<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->integer('available_spots')->unsigned()->default(50)->after('destination');
            $table->boolean('is_star')->default(false)->after('available_spots');
        });
    }

    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn(['available_spots', 'is_star']);
        });
    }
};

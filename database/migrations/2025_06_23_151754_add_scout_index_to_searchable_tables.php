<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Scout\EngineManager;
use Laravel\Scout\Engines\DatabaseEngine;

return new class extends Migration
{
    public function up(): void
    {
        if (app(EngineManager::class)->engine() instanceof DatabaseEngine) {
            Schema::table('articles', function (Blueprint $table) {
                $table->text('scout_index')->nullable()->after('image_path');
            });
            Schema::table('events', function (Blueprint $table) {
                $table->text('scout_index')->nullable()->after('longitude');
            });
            Schema::table('republicas', function (Blueprint $table) {
                $table->text('scout_index')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (app(EngineManager::class)->engine() instanceof DatabaseEngine) {
            Schema::table('articles', function (Blueprint $table) {
                $table->dropColumn('scout_index');
            });
            Schema::table('events', function (Blueprint $table) {
                $table->dropColumn('scout_index');
            });
            Schema::table('republicas', function (Blueprint $table) {
                $table->dropColumn('scout_index');
            });
        }
    }
};
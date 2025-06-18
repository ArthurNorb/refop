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
        Schema::table('republicas', function (Blueprint $table) {
            $table->enum('genero', ['masculina', 'feminina', 'mista'])->after('descricao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('republicas', function (Blueprint $table) {
            $table->dropColumn('genero');
        });
    }
};

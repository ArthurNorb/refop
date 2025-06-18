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
        Schema::create('republica_fotos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('republica_id')->constrained()->onDelete('cascade');
            $table->string('caminho_foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('republica_fotos');
    }
};

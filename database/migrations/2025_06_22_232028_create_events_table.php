<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('location_name');
            $table->dateTime('event_datetime');
            $table->string('image_path')->nullable(); // Imagem é opcional
            $table->decimal('latitude', 10, 7)->nullable(); // Para o mapa
            $table->decimal('longitude', 10, 7)->nullable(); // Para o mapa
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
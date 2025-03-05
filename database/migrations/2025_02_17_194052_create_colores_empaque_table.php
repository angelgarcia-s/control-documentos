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
        Schema::create('colores_empaque', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique(); // Nombre del color (ej. Blanco, Transparente, Azul)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colores_empaque');
    }
};

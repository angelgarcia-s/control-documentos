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
        Schema::create('printcards', function (Blueprint $table) {
            $table->id();

            // Claves foráneas (Probamos con constrained(), pero si falla, usamos unsignedBigInteger)
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->foreignId('clasificaciones_envases_id')->constrained('clasificaciones_envases')->onDelete('cascade');

            $table->string('codigo_especifico')->unique(); // Código único para identificar el Print Card
            $table->date('fecha_manual')->nullable(); // Fecha de impresión ingresada manualmente
            $table->string('codigo_barra')->nullable(); // Puede ser un código de barras o la palabra "colectivo"
            $table->string('revision')->nullable(); // Número de revisión
            $table->string('estado')->default('Activo'); // Activo/Inactivo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('printcards');
    }
};

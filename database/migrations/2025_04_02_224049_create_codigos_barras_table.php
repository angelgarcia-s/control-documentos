<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodigosBarrasTable extends Migration
{
    public function up(): void
    {
        Schema::create('codigos_barras', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20); // EAN13 o ITF14, suficiente con 20 caracteres
            $table->string('nombre_corto')->nullable(); // Se llena al asignar al producto
            $table->string('sku')->nullable(); // Se llena al asignar al producto

            $table->foreignId('producto_id')->nullable()
                ->constrained('productos')->nullOnDelete();

            $table->foreignId('tipo_empaque_id')->nullable()
                ->constrained('tipos_empaque')->nullOnDelete();

            $table->decimal('contenido', 8, 2)->nullable(); // Ej. 325.5 gramos, mililitros, etc.
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('codigos_barras');
    }
}
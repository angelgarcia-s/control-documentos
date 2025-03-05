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
        Schema::create('codigos_barras', function (Blueprint $table) {
            $table->id();
            
            // Claves foráneas corregidas
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('set null');

            $table->unsignedBigInteger('tipo_empaque_id')->nullable();
            $table->foreign('tipo_empaque_id')->references('id')->on('tipos_empaque')->onDelete('set null');


            $table->string('tipo_codigo', 10); // EAN13, ITF14
            $table->string('codigo_barra', 14)->unique();
            $table->string('estado')->default('Activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codigos_barras');
    }
};

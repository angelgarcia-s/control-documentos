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
        Schema::create('print_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_codigo_barra_id');
            $table->unsignedBigInteger('proveedor_id');
            $table->string('nombre');
            $table->enum('status', ['En proyecto', 'Activo', 'Discontinuado']);
            $table->text('notas')->nullable();
            $table->string('registro_sanitario')->nullable();
            $table->date('fecha')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('producto_codigo_barra_id')->references('id')->on('producto_codigos_barras')->onDelete('cascade');
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('restrict');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
            $table->unique(['producto_codigo_barra_id', 'nombre']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('print_cards');
    }
};

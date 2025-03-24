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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 45)->unique();
            $table->string('descripcion', 1000);
            
            // Claves foráneas corregidas (SIN constrained(), usando unsignedBigInteger())
            $table->unsignedBigInteger('id_familia')->nullable();
            $table->foreign('id_familia')->references('id')->on('familia_productos')->onDelete('set null');

            $table->unsignedBigInteger('id_tamano')->nullable();
            $table->foreign('id_tamano')->references('id')->on('tamanos')->onDelete('set null');

            $table->unsignedBigInteger('id_color')->nullable();
            $table->foreign('id_color')->references('id')->on('colores')->onDelete('set null');

            $table->unsignedBigInteger('id_proveedor')->nullable();
            $table->foreign('id_proveedor')->references('id')->on('proveedores')->onDelete('set null');

            $table->unsignedBigInteger('id_unidad_medida')->nullable();
            $table->foreign('id_unidad_medida')->references('id')->on('unidad_medida')->onDelete('set null');

            $table->integer('multiplos_master');
            $table->string('producto', 500); // Nombre como PLUS o CONFORT
            $table->string('nombre_corto', 500); // Producto + Color + Tamaño
            $table->integer('cupo_tarima');
            $table->enum('requiere_peso', ['SI', 'NO'])->default('NO');
            $table->float('peso', 7, 2)->nullable();
            $table->float('variacion_peso', 7, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

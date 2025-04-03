<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoCodigosBarrasTable extends Migration
{
    public function up()
    {
        Schema::create('producto_codigos_barras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->foreignId('codigo_barra_id')->constrained('codigos_barras')->onDelete('cascade');
            $table->string('tipo_empaque', 50);
            $table->string('contenido')->nullable();
            $table->timestamps();

            $table->unique(['producto_id', 'tipo_empaque'], 'producto_tipo_empaque_unique');
        });
    }

    public function down()
    {
        Schema::dropIfExists('producto_codigos_barras');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('producto_codigos_barras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->foreignId('codigo_barra_id')->constrained('codigos_barras')->onDelete('cascade');
            $table->string('clasificacion_envase', 50);
            $table->string('contenido')->nullable();
            $table->timestamps();

            $table->unique(['producto_id', 'clasificacion_envase'], 'producto_clasificacion_envase_unique');
        });
    }

    public function down()
    {
        Schema::dropIfExists('producto_codigos_barras');
    }
};

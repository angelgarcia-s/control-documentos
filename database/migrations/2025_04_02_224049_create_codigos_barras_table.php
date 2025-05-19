<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodigosBarrasTable extends Migration
{
    public function up()
    {
        Schema::create('codigos_barras', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 50)->unique();
            $table->string('nombre', 255);
            $table->string('clasificacion_envase', 50);
            $table->string('contenido')->nullable();
            $table->string('tipo', 10)->in(['EAN13', 'ITF14']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('codigos_barras');
    }
}

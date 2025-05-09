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
        Schema::create('nombres_visuales_categorias_permisos', function (Blueprint $table) {
            $table->id();
            $table->string('categoria')->unique();
            $table->string('nombre_visual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nombres_visuales_categorias_permisos');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\CodigoBarra;

return new class extends Migration
{
    public function up(): void
    {
        // Eliminar registros existentes para simplificar la migración
        CodigoBarra::truncate();

        Schema::table('codigos_barras', function (Blueprint $table) {
            $table->unsignedBigInteger('color_id')->nullable()->after('nombre');
            $table->foreign('color_id')->references('id')->on('colores')->onDelete('set null');
            $table->unsignedBigInteger('tamano_id')->nullable()->after('color_id'); // Cambiado de 'talla_id' a 'tamano_id'
            $table->foreign('tamano_id')->references('id')->on('tamanos')->onDelete('set null');
            $table->string('nombre_corto')->nullable()->after('tamano_id');
        });
    }

    public function down(): void
    {
        Schema::table('codigos_barras', function (Blueprint $table) {
            // Eliminar las claves foráneas explícitamente
            $table->dropForeign('codigos_barras_color_id_foreign');
            $table->dropForeign('codigos_barras_tamano_id_foreign'); // Cambiado de 'talla_id' a 'tamano_id'

            // Ahora eliminar las columnas
            $table->dropColumn('color_id');
            $table->dropColumn('tamano_id'); // Cambiado de 'talla_id' a 'tamano_id'
            $table->dropColumn('nombre_corto');
        });
    }
};

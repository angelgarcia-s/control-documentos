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
        Schema::table('nombres_visuales_categorias_permisos', function (Blueprint $table) {
            $table->integer('orden')->unsigned()->nullable()->after('nombre_visual');
        });

        // Inicializar el campo orden para las categorías existentes
        $categorias = DB::table('nombres_visuales_categorias_permisos')->get();
        $orden = 1;
        foreach ($categorias as $categoria) {
            DB::table('nombres_visuales_categorias_permisos')
                ->where('id', $categoria->id)
                ->update(['orden' => $orden++]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nombres_visuales_categorias_permisos', function (Blueprint $table) {
            $table->dropColumn('orden');
        });
    }
};

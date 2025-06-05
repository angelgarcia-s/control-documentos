<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEstadoInPrintCardRevisionesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Agregar la columna estado_printcard_id
        Schema::table('print_card_revisiones', function (Blueprint $table) {
            $table->unsignedBigInteger('estado_printcard_id')->nullable()->after('print_card_id');
        });


        // 3. Eliminar la columna ENUM 'estado'
        Schema::table('print_card_revisiones', function (Blueprint $table) {
            $table->dropColumn('estado');
        });

        // 4. Agregar la relación foránea
        Schema::table('print_card_revisiones', function (Blueprint $table) {
            $table->foreign('estado_printcard_id')->references('id')->on('estado_print_cards')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('print_card_revisiones', function (Blueprint $table) {
            $table->dropForeign(['estado_printcard_id']);
            $table->dropColumn('estado_printcard_id');
            $table->enum('estado', ['Vigente', 'En Proyecto', 'Descontinuado'])->nullable(); // Ajustar valores según los originales
        });
    }
}

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
        Schema::table('codigos_barras', function (Blueprint $table) {
            $table->string('consecutivo_codigo', 3)->nullable()->after('codigo'); // Campo para el consecutivo (3 dígitos)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('codigos_barras', function (Blueprint $table) {
            $table->dropColumn('consecutivo_codigo');
        });
    }
};

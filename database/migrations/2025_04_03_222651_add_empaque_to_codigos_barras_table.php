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
            $table->string('empaque', 50)->nullable()->after('clasificacion_envase');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('codigos_barras', function (Blueprint $table) {
            $table->dropColumn('empaque');
        });
    }
};

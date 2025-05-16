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
        Schema::table('familia_productos', function (Blueprint $table) {
            $table->string('imagen')->nullable()->after('nombre');
            $table->text('descripcion')->nullable()->after('imagen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('familia_productos', function (Blueprint $table) {
            $table->dropColumn('imagen');
            $table->dropColumn('descripcion');
        });
    }
};

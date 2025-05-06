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
        Schema::table('permissions', function (Blueprint $table) {
            // Añadir el campo 'description' como string, nullable para permisos existentes
            $table->string('description')->nullable()->after('name');
            // Añadir el campo 'category' como string, nullable para permisos existentes
            $table->string('category')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            // Eliminar los campos 'description' y 'category' si se hace un rollback
            $table->dropColumn('description');
            $table->dropColumn('category');
        });
    }
};

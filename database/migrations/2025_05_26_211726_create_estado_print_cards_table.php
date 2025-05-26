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
        Schema::create('estado_print_cards', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('color', 30)->nullable(); // Ejemplo: 'success', 'danger', 'warning', 'info'
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_print_cards');
    }
};

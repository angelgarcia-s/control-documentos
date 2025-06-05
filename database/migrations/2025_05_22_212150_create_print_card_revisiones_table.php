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
        Schema::create('print_card_revisiones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('print_card_id')->constrained('print_cards')->onDelete('cascade');
            $table->integer('revision');
            $table->enum('estado', ['Vigente', 'En Proyecto', 'Descontinuado']); // Enum temporal
            $table->text('notas')->nullable();
            $table->foreignId('revisado_por')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('fecha_revision')->nullable();
            $table->string('pdf_path')->nullable();
            $table->text('historial_revision')->nullable(); // Historial de cambios
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('print_card_revisiones');
    }
};

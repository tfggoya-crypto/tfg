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
    Schema::create('incidencias', function (Blueprint $table) {
    $table->id();
    $table->string('descripcion');
    $table->enum('prioridad', ['baja','media','alta'])->default('media');
    $table->enum('estado', ['abierta','en_progreso','cerrada'])->default('abierta');
    $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
    $table->foreignId('edificio_id')->constrained('edificios')->onDelete('cascade');
    $table->timestamps();
});


}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencias');
    }
};

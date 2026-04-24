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

            $table->string('titulo');
            $table->text('descripcion');

            $table->enum('estado', ['pendiente', 'en_proceso', 'resuelta'])->default('pendiente');
            $table->enum('prioridad', ['baja', 'media', 'alta'])->default('baja');

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('edificio_id')->constrained()->cascadeOnDelete();
            $table->foreignId('asignado_a')->nullable()->constrained('users')->nullOnDelete();


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

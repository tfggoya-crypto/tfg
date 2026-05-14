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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();

            // Información personal
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('email');
            $table->string('telefono')->nullable();

            // Tipo de consulta
            $table->string('tipo_consulta');

            // Mensaje
            $table->string('asunto');
            $table->text('mensaje');

            // Política privacidad
            $table->boolean('privacidad')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('edificio_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subido_por')->constrained('users')->cascadeOnDelete();

            $table->string('nombre');
            $table->string('archivo_url');

            $table->enum('tipo', ['acta', 'factura', 'contrato']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};

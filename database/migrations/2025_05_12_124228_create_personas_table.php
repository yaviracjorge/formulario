<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('cedula_pasaporte', 20)->unique();
            $table->string('ruc', 20)->nullable();
            $table->string('apellidos', 100);
            $table->string('nombres', 100);
            $table->date('fecha_nacimiento');
            $table->string('correo')->unique();
            $table->string('estado_civil', 20);
            $table->integer('num_hijos')->nullable();
            $table->timestamps();

            // Índices para consultas frecuentes
            $table->index('fecha_nacimiento');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};

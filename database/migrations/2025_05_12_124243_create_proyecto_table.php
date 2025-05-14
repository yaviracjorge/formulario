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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_proyecto', 100);
            // otros campos específicos del proyecto
            $table->timestamps();
        });


        Schema::create('proyecto_persona', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained('personas')->onDelete('cascade');
            $table->foreignId('proyecto_id')->constrained('proyectos')->onDelete('cascade');
            $table->date('fecha_ingreso');
            $table->date('fecha_salida')->nullable();
            $table->string('cargo', 100);
            $table->string('tiempo_dedicacion', 3);
            $table->string('sucursal', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecto');
    }
};

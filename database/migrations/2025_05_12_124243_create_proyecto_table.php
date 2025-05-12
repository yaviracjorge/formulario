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
        Schema::create('proyecto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained('personas')->onDelete('cascade');
            $table->date('fecha_ingreso');
            $table->string('cargo', 100);
            $table->string('tiempo_dedicacion', 50);
            $table->string('proyecto_inicio', 100);
            $table->string('proyecto_actual', 100);
            $table->string('sucursal', 100);
            $table->string('lugar_sufragio', 100);
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

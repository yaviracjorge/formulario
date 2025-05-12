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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('cedula_pasaporte', 20)->unique();
            $table->string('ruc', 20)->nullable();
            $table->string('apellidos', 100);
            $table->string('nombres', 100);
            $table->string('estado_civil', 20)->nullable();
            $table->integer('num_hijos')->nullable();
            $table->string('restriccion_alimentaria', 100)->nullable();
            $table->text('direccion_domicilio');
            $table->date('fecha_nacimiento');
            $table->string('lugar_nacimiento', 100);
            $table->string('pais_nacimiento', 50);
            $table->string('provincia_nacimiento', 50);
            $table->string('canton_nacimiento', 50);
            $table->boolean('posee_discapacidad')->default(false);
            $table->string('discapacidad_detalle', 100)->nullable();
            $table->boolean('posee_alergia')->default(false);
            $table->string('alergia_detalle', 100)->nullable();
            $table->string('tipo_sangre', 5);
            $table->string('contacto_emergencia_nombre', 100)->nullable();
            $table->string('contacto_emergencia_parentesco', 50)->nullable();
            $table->string('contacto_emergencia_convencional', 20)->nullable();
            $table->string('contacto_emergencia_celular', 20)->nullable();
            $table->string('telefono_convencional', 20)->nullable();
            $table->string('telefono_celular', 20)->nullable();
            $table->text('ultima_empresa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};

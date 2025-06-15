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
        Schema::create('informacion_medica', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->unique()->constrained()->onDelete('cascade');
            $table->string('tipo_sangre',6);
            $table->boolean('posee_discapacidad')->default(false);
            $table->string('discapacidad_detalle', 100)->nullable();
            $table->boolean('posee_alergia')->default(false);
            $table->string('alergia_detalle',100)->nullable(); 
            $table->boolean('posee_restriccion_alimentaria')->default(false); 
            $table->text('restriccion_alimentaria_detalle')->nullable(); 
            $table->timestamps();

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion_medica');
    }
};

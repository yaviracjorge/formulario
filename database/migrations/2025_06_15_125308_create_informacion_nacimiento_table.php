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
    Schema::create('informacion_nacimiento', function (Blueprint $table) {
        $table->id();
        $table->foreignId('persona_id')->unique()->constrained()->onDelete('cascade');
        
        $table->string('pais_nacimiento', 30);
        $table->string('provincia_nacimiento', 30);
        $table->string('canton_nacimiento', 30);
        
        $table->timestamps();
        

    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion_nacimiento');
    }
};

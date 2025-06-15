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
        Schema::create('direccion_domicilio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->unique()->constrained()->onDelete('cascade');
            $table->text('direccion_completa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direccion_domicilio');
    }
};

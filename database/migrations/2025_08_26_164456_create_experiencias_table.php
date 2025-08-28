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
        Schema::create('experiencias', function (Blueprint $table) {
            $table->id();

            $table->foreignId('datos_personales_id')->constrained()->onDelete('cascade');

            $table->foreignId('tipos_experiencias_id')->constrained()->onDelete('cascade');

            $table->string('nombre')->unique();
            $table->text('descripcion')->nullable();
            $table->string('ubicacion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiencias');
    }
};

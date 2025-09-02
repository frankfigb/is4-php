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
        Schema::create('datos_personales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('descripcion');
            $table->date('fecha_nacimiento');
            $table->string('ciudad_domicilio');
            $table->string('sitio_web');
            $table->string('correo');
            $table->boolean('disponible');
            $table->string('telefono');
            $table->string('grado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_personales');
    }
};

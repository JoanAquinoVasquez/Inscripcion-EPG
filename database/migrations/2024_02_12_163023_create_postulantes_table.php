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
        Schema::create('postulantes', function (Blueprint $table) {
            $table->id();
            $table->string('Ap');
            $table->string('Am');
            $table->string('Nombres');
            $table->string('Correo');
            $table->string('DNI')->unique();
            $table->string('Celular');
            $table->date('Fecha_nacimiento');
            $table->string('Sexo');
            $table->string('Departamento');
            $table->string('Provincia');
            $table->string('Distrito');
            $table->string('Direccion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulantes');
    }
};

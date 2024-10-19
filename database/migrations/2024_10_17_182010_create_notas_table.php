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
        Schema::create('notas', function (Blueprint $table) {
            $table->id(); // Identificador único

            // Relación con la tabla de carreras
            $table->unsignedBigInteger('carrera_id');
            $table->foreign('carrera_id')->references('id')->on('carrera')->onDelete('cascade');

            // Relación con la tabla de estudiantes
            $table->unsignedBigInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('estudiantes')->onDelete('cascade');

            // Relación con la tabla de cursos
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('curso')->onDelete('cascade');

            // Nota final del alumno, con restricción de 0 a 100
            $table->decimal('nota_final', 5, 2)->check('nota_final >= 0 AND nota_final <= 100'); // Nota entre 0 y 100

            $table->timestamps(); // Para las marcas de tiempo (creación y actualización)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};

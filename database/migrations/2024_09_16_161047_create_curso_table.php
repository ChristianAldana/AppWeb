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
        Schema::create('curso', function (Blueprint $table) {
            $table->id();

            
            // Campo relacionado con la tabla carrera (nombre)
            $table->unsignedBigInteger('carrera');
            $table->foreign('carrera')->references('id')->on('carrera')->onDelete('cascade');

            $table->string('nombre'); // Nombre del curso
            $table->text('descripcion'); // Descripción del curso

            // Campo relacionado con la tabla nivel (nivel)
            $table->unsignedBigInteger('nivel');
            $table->foreign('nivel')->references('id')->on('nivel')->onDelete('cascade');
         
            // Campo relacionado con la tabla estado (estado)
            $table->unsignedBigInteger('estado');
            $table->foreign('estado')->references('id')->on('estado')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso');
    }
};

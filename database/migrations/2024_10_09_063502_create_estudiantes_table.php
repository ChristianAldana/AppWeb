
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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('carnet')->unique(); // Código personal
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('edad');

            // Relación con carrera
            $table->unsignedBigInteger('carrera');
            $table->foreign('carrera')->references('id')->on('carrera')->onDelete('cascade');

            // Relación con nivel
            $table->unsignedBigInteger('nivel');
            $table->foreign('nivel')->references('id')->on('nivel')->onDelete('cascade');

            // Estado (activo/inactivo)
            $table->unsignedBigInteger('estado');
            $table->foreign('estado')->references('id')->on('estado')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};


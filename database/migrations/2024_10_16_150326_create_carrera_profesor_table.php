<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('carrera_profesor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profesor_id');
            $table->unsignedBigInteger('carrera_id');
            $table->foreign('profesor_id')->references('id')->on('profesor')->onDelete('cascade');
            $table->foreign('carrera_id')->references('id')->on('carrera')->onDelete('cascade');
            $table->timestamps();  // Para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('carrera_profesor');
    }
};
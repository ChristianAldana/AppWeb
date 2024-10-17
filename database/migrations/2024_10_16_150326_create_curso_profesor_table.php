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
        Schema::create('curso_profesor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profesor_id');
            $table->unsignedBigInteger('curso_id');
            $table->foreign('profesor_id')->references('id')->on('profesor')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('curso')->onDelete('cascade');
            $table->timestamps();  // Para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('curso_profesor');
    }
};

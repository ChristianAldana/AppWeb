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
        Schema::create('profesor', function (Blueprint $table) {
            $table->id();
            $table->string('dpi')->unique();  // El DPI es único
            $table->string('nombre');
            $table->string('apellido');
            $table->string('numero_contacto');
            $table->timestamps();  // Para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('profesor');
    }
};
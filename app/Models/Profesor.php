<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla
    protected $table = 'profesor'; // Añade esta línea

    protected $fillable = [
        'dpi', 'nombre', 'apellido', 'numero_contacto'
    ];

    // Relación con la tabla pivote 'carrera_profesor'
    public function carreras()
    {
        return $this->belongsToMany(Carrera::class, 'carrera_profesor', 'profesor_id', 'carrera_id');
    }

    // Relación con la tabla pivote 'curso_profesor'
    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'curso_profesor', 'profesor_id', 'curso_id');
    }
}

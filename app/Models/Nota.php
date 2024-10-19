<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'carrera_id', 'alumno_id', 'curso_id', 'nota_final',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'alumno_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $table = 'carrera';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // Relación con el modelo Curso
    public function cursos()
    {
        return $this->hasMany(Curso::class, 'carrera');
    }
}

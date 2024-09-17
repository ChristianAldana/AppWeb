<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // Especificar la tabla asociada a este modelo
    protected $table = 'curso';

    // Indicar la clave primaria de la tabla
    protected $primaryKey = 'id';

    // Indicar si las marcas de tiempo (created_at, updated_at) están habilitadas
    public $timestamps = true;

    // Especificar los campos que pueden ser llenados masivamente
    protected $fillable = [
        'carrera', 'nombre', 'descripcion', 'nivel', 'estado'
    ];

    // Relación con el modelo Carrera
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera');
    }

    // Relación con el modelo Nivel
    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'nivel');
    }

    // Relación con el modelo Estado
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado');
    }
}
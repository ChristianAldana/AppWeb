<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'carnet', 'nombre', 'apellido', 'edad', 'carrera', 'nivel', 'estado'
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
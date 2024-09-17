<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Curso; // Asegúrate de incluir el modelo Curso

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function cuartocomputacion()
    {
        // Filtrar los cursos por el nivel '4to' y ordenar por nombre
        $cursos = Curso::whereHas('nivel', function ($query) {
            $query->where('nivel', '4to');
        })
        ->whereHas('carrera', function ($query) {
            $query->where('nombre', 'BACHILLERATO EN COMPUTACIÓN');
        })
        ->orderBy('nombre', 'asc')
        ->paginate(6);

        return view('4tocomputacion', compact('cursos'));
    }


    public function computacion()
    {
        // Filtrar los cursos por el nivel '5to' y ordenar por nombre
        $cursos = Curso::whereHas('nivel', function ($query) {
            $query->where('nivel', '4to');
        })
        ->whereHas('carrera', function ($query) {
            $query->where('nombre', 'BACHILLERATO EN COMPUTACIÓN');
        })
        ->orderBy('nombre', 'asc')
        ->paginate(6);

        return view('computacion', compact('cursos'));
    }



    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    function cuartocomputacion()
    {

        $cursos = Curso::where('nivel', '4to')->orderBy('nombre', 'asc')->paginate(6);
        return view('4tocomputacion', compact('cursos','cursos'));

    }


    function computacion()
    {

        $cursos = Curso::orderBy('nombre', 'asc')->paginate(5);
        return view('computacion', compact('cursos','cursos'));

    }






    
    function cuartoPerito()
    {

        $cursos = Curso::where('nivel', '4to')->orderBy('nombre', 'asc')->paginate(6);
        return view('4toperito', compact('cursos','cursos'));

    }

   
    function quintoPerito()
    {

        $cursos = Curso::where('nivel', '5to')->orderBy('nombre', 'asc')->paginate(6);
        return view('perito', compact('cursos','cursos'));

    }


    function sextoPerito()
    {

        $cursos = Curso::where('nivel', '6to')->orderBy('nombre', 'asc')->paginate(6);
        return view('6toperito', compact('cursos','cursos'));

    }

          
    

      
    function cuartoMagisterio()
    {

        $cursos = Curso::where('nivel', '4to')->orderBy('nombre', 'asc')->paginate(6);
        return view('4tomagisterio', compact('cursos','cursos'));

    }

   
    function quintoMagisterio()
    {

        $cursos = Curso::where('nivel', '5to')->orderBy('nombre', 'asc')->paginate(6);
        return view('magisterio', compact('cursos','cursos'));

    }


    function sextoMagisterio()
    {

        $cursos = Curso::where('nivel', '6to')->orderBy('nombre', 'asc')->paginate(6);
        return view('6tomagisterio', compact('cursos','cursos'));

    }






    function cuartoSecretariado()
    {

        $cursos = Curso::where('nivel', '4to')->orderBy('nombre', 'asc')->paginate(6);
        return view('4tosecretariado', compact('cursos','cursos'));

    }

   
    function quintoSecretariado()
    {

        $cursos = Curso::where('nivel', '5to')->orderBy('nombre', 'asc')->paginate(6);
        return view('secretariado', compact('cursos','cursos'));

    }


    function sextoSecretariado()
    {

        $cursos = Curso::where('nivel', '6to')->orderBy('nombre', 'asc')->paginate(6);
        return view('6tosecretariado', compact('cursos','cursos'));

    }





}

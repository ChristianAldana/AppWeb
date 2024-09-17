<?php

namespace App\Http\Controllers;

use App\Models\Curso; // Modelo Curso
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CursoController extends Controller
{
    public function index($year = '4to', $carrera = 'BACHILLERATO EN COMPUTACIÓN')
    {
        $cursos = DB::table('curso')
            ->join('carrera', 'curso.carrera', '=', 'carrera.id')
            ->join('nivel', 'curso.nivel', '=', 'nivel.id')
            ->join('estado', 'curso.estado', '=', 'estado.id')
            ->select('curso.id', 'carrera.nombre as carrera_nombre', 'curso.nombre', 'curso.descripcion', 'nivel.nivel as nivel_nombre', 'estado.estado as estado_nombre')
            ->where('nivel.nivel', $year)
            ->where('carrera.nombre', $carrera)
            ->orderBy('curso.id', 'asc') // Ordena por ID
            ->get(); // Obtiene todos los resultados sin paginación

        return view('4tocomputacion', compact('cursos'));
    }



    public function computacion($year = '5to', $carrera = 'BACHILLERATO EN COMPUTACIÓN')
    {
        $cursos = DB::table('curso')
            ->join('carrera', 'curso.carrera', '=', 'carrera.id')
            ->join('nivel', 'curso.nivel', '=', 'nivel.id')
            ->join('estado', 'curso.estado', '=', 'estado.id')
            ->select('curso.id', 'carrera.nombre as carrera_nombre', 'curso.nombre', 'curso.descripcion', 'nivel.nivel as nivel_nombre', 'estado.estado as estado_nombre')
            ->where('nivel.nivel', $year)
            ->where('carrera.nombre', $carrera)
            ->orderBy('curso.id', 'asc') // Ordena por ID
            ->get(); // Obtiene todos los resultados sin paginación

        return view('computacion', compact('cursos'));
    }


    public function cuartoPerito($year = '4to', $carrera = 'PERITO EN ADMINISTRACIÓN DE EMPRESAS')
    {
        $cursos = DB::table('curso')
            ->join('carrera', 'curso.carrera', '=', 'carrera.id')
            ->join('nivel', 'curso.nivel', '=', 'nivel.id')
            ->join('estado', 'curso.estado', '=', 'estado.id')
            ->select('curso.id', 'carrera.nombre as carrera_nombre', 'curso.nombre', 'curso.descripcion', 'nivel.nivel as nivel_nombre', 'estado.estado as estado_nombre')
            ->where('nivel.nivel', $year)
            ->where('carrera.nombre', $carrera)
            ->orderBy('curso.id', 'asc') // Ordena por ID
            ->get(); // Obtiene todos los resultados sin paginación

        return view('4toperito', compact('cursos'));
    }


    
    public function quintoPerito($year = '5to', $carrera = 'PERITO EN ADMINISTRACIÓN DE EMPRESAS')
    {
        $cursos = DB::table('curso')
            ->join('carrera', 'curso.carrera', '=', 'carrera.id')
            ->join('nivel', 'curso.nivel', '=', 'nivel.id')
            ->join('estado', 'curso.estado', '=', 'estado.id')
            ->select('curso.id', 'carrera.nombre as carrera_nombre', 'curso.nombre', 'curso.descripcion', 'nivel.nivel as nivel_nombre', 'estado.estado as estado_nombre')
            ->where('nivel.nivel', $year)
            ->where('carrera.nombre', $carrera)
            ->orderBy('curso.id', 'asc') // Ordena por ID
            ->get(); // Obtiene todos los resultados sin paginación

        return view('perito', compact('cursos'));
    }

     
    public function sextoPerito($year = '6to', $carrera = 'PERITO EN ADMINISTRACIÓN DE EMPRESAS')
    {
        $cursos = DB::table('curso')
            ->join('carrera', 'curso.carrera', '=', 'carrera.id')
            ->join('nivel', 'curso.nivel', '=', 'nivel.id')
            ->join('estado', 'curso.estado', '=', 'estado.id')
            ->select('curso.id', 'carrera.nombre as carrera_nombre', 'curso.nombre', 'curso.descripcion', 'nivel.nivel as nivel_nombre', 'estado.estado as estado_nombre')
            ->where('nivel.nivel', $year)
            ->where('carrera.nombre', $carrera)
            ->orderBy('curso.id', 'asc') // Ordena por ID
            ->get(); // Obtiene todos los resultados sin paginación

        return view('6toperito', compact('cursos'));
    }




    public function cuartoMagisterio($year = '4to', $carrera = 'MAGISTERIO INFANTIL INTERCULTURAL')
    {
        $cursos = DB::table('curso')
            ->join('carrera', 'curso.carrera', '=', 'carrera.id')
            ->join('nivel', 'curso.nivel', '=', 'nivel.id')
            ->join('estado', 'curso.estado', '=', 'estado.id')
            ->select('curso.id', 'carrera.nombre as carrera_nombre', 'curso.nombre', 'curso.descripcion', 'nivel.nivel as nivel_nombre', 'estado.estado as estado_nombre')
            ->where('nivel.nivel', $year)
            ->where('carrera.nombre', $carrera)
            ->orderBy('curso.id', 'asc') // Ordena por ID
            ->get(); // Obtiene todos los resultados sin paginación

        return view('4tomagisterio', compact('cursos'));
    }



    public function quintoMagisterio($year = '5to', $carrera = 'MAGISTERIO INFANTIL INTERCULTURAL')
    {
        $cursos = DB::table('curso')
            ->join('carrera', 'curso.carrera', '=', 'carrera.id')
            ->join('nivel', 'curso.nivel', '=', 'nivel.id')
            ->join('estado', 'curso.estado', '=', 'estado.id')
            ->select('curso.id', 'carrera.nombre as carrera_nombre', 'curso.nombre', 'curso.descripcion', 'nivel.nivel as nivel_nombre', 'estado.estado as estado_nombre')
            ->where('nivel.nivel', $year)
            ->where('carrera.nombre', $carrera)
            ->orderBy('curso.id', 'asc') // Ordena por ID
            ->get(); // Obtiene todos los resultados sin paginación

        return view('magisterio', compact('cursos'));
    }



    public function sextoMagisterio($year = '6to', $carrera = 'MAGISTERIO INFANTIL INTERCULTURAL')
    {
        $cursos = DB::table('curso')
            ->join('carrera', 'curso.carrera', '=', 'carrera.id')
            ->join('nivel', 'curso.nivel', '=', 'nivel.id')
            ->join('estado', 'curso.estado', '=', 'estado.id')
            ->select('curso.id', 'carrera.nombre as carrera_nombre', 'curso.nombre', 'curso.descripcion', 'nivel.nivel as nivel_nombre', 'estado.estado as estado_nombre')
            ->where('nivel.nivel', $year)
            ->where('carrera.nombre', $carrera)
            ->orderBy('curso.id', 'asc') // Ordena por ID
            ->get(); // Obtiene todos los resultados sin paginación

        return view('6tomagisterio', compact('cursos'));
    }


    public function cuartoSecretariado($year = '4to', $carrera = 'SECRETARIADO BILINGÜE INGLÉS-ESPAÑOL')
    {
        $cursos = DB::table('curso')
            ->join('carrera', 'curso.carrera', '=', 'carrera.id')
            ->join('nivel', 'curso.nivel', '=', 'nivel.id')
            ->join('estado', 'curso.estado', '=', 'estado.id')
            ->select('curso.id', 'carrera.nombre as carrera_nombre', 'curso.nombre', 'curso.descripcion', 'nivel.nivel as nivel_nombre', 'estado.estado as estado_nombre')
            ->where('nivel.nivel', $year)
            ->where('carrera.nombre', $carrera)
            ->orderBy('curso.id', 'asc') // Ordena por ID
            ->get(); // Obtiene todos los resultados sin paginación

        return view('4tosecretariado', compact('cursos'));
    }


    public function quintoSecretariado($year = '5to', $carrera = 'SECRETARIADO BILINGÜE INGLÉS-ESPAÑOL')
    {
        $cursos = DB::table('curso')
            ->join('carrera', 'curso.carrera', '=', 'carrera.id')
            ->join('nivel', 'curso.nivel', '=', 'nivel.id')
            ->join('estado', 'curso.estado', '=', 'estado.id')
            ->select('curso.id', 'carrera.nombre as carrera_nombre', 'curso.nombre', 'curso.descripcion', 'nivel.nivel as nivel_nombre', 'estado.estado as estado_nombre')
            ->where('nivel.nivel', $year)
            ->where('carrera.nombre', $carrera)
            ->orderBy('curso.id', 'asc') // Ordena por ID
            ->get(); // Obtiene todos los resultados sin paginación

        return view('secretariado', compact('cursos'));
    }


    public function sextoSecretariado($year = '6to', $carrera = 'SECRETARIADO BILINGÜE INGLÉS-ESPAÑOL')
    {
        $cursos = DB::table('curso')
            ->join('carrera', 'curso.carrera', '=', 'carrera.id')
            ->join('nivel', 'curso.nivel', '=', 'nivel.id')
            ->join('estado', 'curso.estado', '=', 'estado.id')
            ->select('curso.id', 'carrera.nombre as carrera_nombre', 'curso.nombre', 'curso.descripcion', 'nivel.nivel as nivel_nombre', 'estado.estado as estado_nombre')
            ->where('nivel.nivel', $year)
            ->where('carrera.nombre', $carrera)
            ->orderBy('curso.id', 'asc') // Ordena por ID
            ->get(); // Obtiene todos los resultados sin paginación

        return view('6tosecretariado', compact('cursos'));
    }


}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Profesor; 
use App\Models\Carrera;   
use App\Models\Curso;      
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function index()
    {
        try {
            $profesores = DB::table('profesor')
                ->join('carrera_profesor', 'profesor.id', '=', 'carrera_profesor.profesor_id') // Cambiar a 'profesor.id'
                ->join('curso_profesor', 'profesor.id', '=', 'curso_profesor.profesor_id') // Cambiar a 'profesor.id'
                ->join('carrera', 'carrera_profesor.carrera_id', '=', 'carrera.id')
                ->join('curso', 'curso_profesor.curso_id', '=', 'curso.id')
                ->select('profesor.*', 'carrera.nombre as carrera_nombre', 'curso.nombre as curso_nombre')
                ->get();
    
            return response()->json($profesores);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener profesores: ' . $e->getMessage()], 500);
        }
    }
    

    // Función para mostrar el formulario de creación
    public function create()
    {
        try {
            // Obtener datos de carreras y cursos
            $carreras = Carrera::all();
            $cursos = Curso::all();
            
            return response()->json([
                'carreras' => $carreras,
                'cursos' => $cursos,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener datos: ' . $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
{
    try {
        $request->validate([
            'dpi' => 'required|unique:profesor',
            'nombre' => 'required',
            'apellido' => 'required',
            'numero_contacto' => 'required',
            'carreras' => 'array|nullable',  // Acepta array pero es opcional
            'cursos' => 'array|nullable',    // Acepta array pero es opcional
        ]);

        // Crear el profesor
        $profesor = Profesor::create($request->all());

        // Asignar las relaciones en la tabla pivote si existen
        if ($request->has('carreras') && !empty($request->carreras)) {
            $profesor->carreras()->attach($request->carreras);
        }

        if ($request->has('cursos') && !empty($request->cursos)) {
            $profesor->cursos()->attach($request->cursos);
        }

        return response()->json($profesor, 201);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al registrar el profesor: ' . $e->getMessage()], 500);
    }
}


    // Función para mostrar un profesor específico
    public function show(string $dpi)
    {
        $profesor = Profesor::where('dpi', $dpi)->first();
    
        if ($profesor) {
            return response()->json($profesor);
        } else {
            return response()->json(['error' => 'Profesor no encontrado'], 404);
        }
    }

    // Función para mostrar el formulario de edición de un profesor
    public function edit(string $dpi)
    {
        $profesor = Profesor::where('dpi', $dpi)->first();

        if ($profesor) {
            return response()->json($profesor);
        } else {
            return response()->json(['error' => 'Profesor no encontrado'], 404);
        }
    }

    public function update(Request $request, string $dpi)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'numero_contacto' => 'required|string|max:15', // Campo correcto como 'numero_contacto'
            'carreras' => 'array',
            'cursos' => 'array',
        ]);

        $profesor = Profesor::where('dpi', $dpi)->first();

        if ($profesor) {
            $profesor->update($request->all());

            // Actualizar las relaciones en la tabla pivote
            if ($request->has('carreras')) {
                $profesor->carreras()->sync($request->carreras);
            }

            if ($request->has('cursos')) {
                $profesor->cursos()->sync($request->cursos);
            }

            return response()->json(['message' => 'Profesor actualizado con éxito']);
        } else {
            return response()->json(['error' => 'Profesor no encontrado'], 404);
        }
    }

    // Función para eliminar un profesor
    public function destroy(string $dpi)
    {
        $profesor = Profesor::where('dpi', $dpi)->first();

        if ($profesor) {
            // Eliminar las relaciones en la tabla pivote
            $profesor->carreras()->detach();
            $profesor->cursos()->detach();

            $profesor->delete();
            return response()->json(['message' => 'Profesor eliminado con éxito']);
        } else {
            return response()->json(['error' => 'Profesor no encontrado'], 404);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Estudiante; 
use App\Models\Carrera;   
use App\Models\Nivel;      
use App\Models\Estado;     
use Illuminate\Http\Request;

class EstudianteController extends Controller

{
    public function index()
    {
        try {
            $estudiantes = DB::table('estudiantes')
                ->join('carrera', 'estudiantes.carrera', '=', 'carrera.id')
                ->join('nivel', 'estudiantes.nivel', '=', 'nivel.id')
                ->join('estado', 'estudiantes.estado', '=', 'estado.id')
                ->select('estudiantes.*', 'carrera.nombre as carrera_nombre', 'nivel.nivel as nivel_nombre', 'estado.estado as estado_nombre')
                ->get();
    
            return response()->json($estudiantes);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener estudiantes: ' . $e->getMessage()], 500);
        }
    }
    // Función para mostrar el formulario de creación
    public function create()
    {
        try {
            // Obtener datos de carrera, nivel y estado
            $carreras = Carrera::all();
            $niveles = Nivel::all();
            $estados = Estado::all();
            
            return response()->json([
                'carreras' => $carreras,
                'niveles' => $niveles,
                'estados' => $estados,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener datos: ' . $e->getMessage()], 500);
        }
    }

    // Función para almacenar un nuevo estudiante
    public function store(Request $request)
{
    try {
        $request->validate([
           'carnet' => 'required|unique:estudiantes',
            'nombre' => 'required',
            'apellido' => 'required',
            'edad' => 'required|integer',
          
        ]);

        // Si la validación pasa, intenta crear el estudiante
        $estudiante = Estudiante::create($request->all());

        return response()->json($estudiante, 201);
    } catch (\Exception $e) {
        // Agrega el siguiente código para capturar y mostrar errores específicos
        return response()->json(['error' => 'Error al registrar el estudiante: ' . $e->getMessage()], 500);
    }
}

    // Función para mostrar un estudiante específico
    public function show(string $carnet)
    {
        $estudiante = Estudiante::where('carnet', $carnet)->first();
    
        if ($estudiante) {
            return response()->json($estudiante);
        } else {
            return response()->json(['error' => 'Estudiante no encontrado'], 404);
        }
    }
    

    // Función para mostrar el formulario de edición de un estudiante
    public function edit(string $id)
    {
        $estudiante = Estudiante::find($id);

        if ($estudiante) {
            return response()->json($estudiante);
        } else {
            return response()->json(['error' => 'Estudiante no encontrado'], 404);
        }
    }

public function update(Request $request, string $carnet)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'edad' => 'required|integer',
        'carrera' => 'required|exists:carrera,id',
        'nivel' => 'required|exists:nivel,id',
        'estado' => 'required|exists:estado,id',
    ]);

    $estudiante = Estudiante::where('carnet', $carnet)->first();

    if ($estudiante) {
        $estudiante->update($request->all());
        return response()->json(['message' => 'Estudiante actualizado con éxito']);
    } else {
        return response()->json(['error' => 'Estudiante no encontrado'], 404);
    }
}

    
    // Función para eliminar un estudiante
    public function destroy(string $id)
    {
        $estudiante = Estudiante::find($id);

        if ($estudiante) {
            $estudiante->delete();
            return response()->json(['message' => 'Estudiante eliminado con éxito']);
        } else {
            return response()->json(['error' => 'Estudiante no encontrado'], 404);
        }
    }
}

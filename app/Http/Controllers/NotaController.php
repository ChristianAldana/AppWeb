<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Nota;
use App\Models\Carrera;
use App\Models\Curso;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    // Método para obtener cursos y carreras
    public function obtenerCursosYCarreras()
    {
        $carreras = Carrera::all();
        $cursos = Curso::all();

        return response()->json([
            'carreras' => $carreras,
            'cursos' => $cursos,
        ]);
    }

    // Función para mostrar todas las notas
    public function index()
    {
        try {
            $notas = Nota::with(['carrera', 'estudiante', 'curso'])->get();
            return response()->json($notas);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener notas: ' . $e->getMessage()], 500);
        }
    }

    // Función para obtener los cursos de una carrera
    public function getCursosPorCarrera($carrera_id)
    {
        try {
            $cursos = Curso::where('carrera_id', $carrera_id)->get();
            return response()->json($cursos);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener cursos: ' . $e->getMessage()], 500);
        }
    }

    // Función para obtener estudiantes por carrera y curso
    public function getEstudiantesPorCursoYCarrera($carrera_id, $curso_id)
    {
        try {
            $estudiantes = Estudiante::where('carrera', $carrera_id)
                ->where('nivel', $curso_id)
                ->get();
            return response()->json($estudiantes);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener estudiantes: ' . $e->getMessage()], 500);
        }
    }

    // Función para obtener la nota de un estudiante en un curso y carrera específicos
    public function obtenerNotaEstudiante($carrera_id, $curso_id, $alumno_id)
    {
        try {
            $nota = Nota::where('carrera_id', $carrera_id)
                ->where('curso_id', $curso_id)
                ->where('alumno_id', $alumno_id)
                ->first();

            if ($nota) {
                return response()->json($nota);
            } else {
                return response()->json(['error' => 'Nota no encontrada'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener la nota del estudiante: ' . $e->getMessage()], 500);
        }
    }

    // Función para almacenar una nueva nota
    public function store(Request $request)
    {
        try {
            $request->validate([
                'carrera_id' => 'required|exists:carrera,id', 
                'alumno_id' => 'required|exists:estudiantes,id',
                'curso_id' => 'required|exists:curso,id', 
                'nota_final' => 'required|numeric|min:0|max:100',
            ]);

            // Verificar si la nota ya existe
            $notaExistente = Nota::where('carrera_id', $request->carrera_id)
                ->where('curso_id', $request->curso_id)
                ->where('alumno_id', $request->alumno_id)
                ->first();

            if ($notaExistente) {
                // Si existe, actualiza la nota
                $notaExistente->update(['nota_final' => $request->nota_final]);
                return response()->json($notaExistente, 200); // Cambia el código de estado a 200 para indicar éxito
            } else {
                // Si no existe, crea una nueva
                $nota = Nota::create($request->all());
                return response()->json($nota, 201);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al registrar la nota: ' . $e->getMessage()], 500);
        }
    }

    // Función para mostrar una nota específica
    public function show($id)
    {
        $nota = Nota::with(['carrera', 'estudiante', 'curso'])->find($id);

        if ($nota) {
            return response()->json($nota);
        } else {
            return response()->json(['error' => 'Nota no encontrada'], 404);
        }
    }

    // Función para actualizar una nota
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'carrera_id' => 'required|exists:carreras,id', 
                'alumno_id' => 'required|exists:estudiantes,id',
                'curso_id' => 'required|exists:cursos,id', 
                'nota_final' => 'required|numeric|min:0|max:100',
            ]);

            $nota = Nota::find($id);

            if ($nota) {
                $nota->update($request->all());
                return response()->json(['message' => 'Nota actualizada con éxito']);
            } else {
                return response()->json(['error' => 'Nota no encontrada'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar la nota: ' . $e->getMessage()], 500);
        }
    }

    // Función para eliminar una nota
    public function destroy($id)
    {
        $nota = Nota::find($id);

        if ($nota) {
            $nota->delete();
            return response()->json(['message' => 'Nota eliminada con éxito']);
        } else {
            return response()->json(['error' => 'Nota no encontrada'], 404);
        }
    }
}

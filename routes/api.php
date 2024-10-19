<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\NotaController;

/*
|-------------------------------------------------------------------------- 
| API Routes 
|-------------------------------------------------------------------------- 
| 
| Here is where you can register API routes for your application. These 
| routes are loaded by the RouteServiceProvider and all of them will 
| be assigned to the "api" middleware group. Make something great! 
| 
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Rutas de estudiantes
Route::get('/estudiantes', [EstudianteController::class, 'index']);
Route::post('/estudiantes', [EstudianteController::class, 'store']);
Route::get('/estudiantes/create', [EstudianteController::class, 'create']);
Route::get('/estudiantes/{carnet}', [EstudianteController::class, 'show']); 
Route::put('/estudiantes/{carnet}', [EstudianteController::class, 'update']); 
Route::delete('/estudiantes/{id}', [EstudianteController::class, 'destroy']);


// Rutas de profesores
Route::get('/profesor', [ProfesorController::class, 'index']);
Route::post('/profesor', [ProfesorController::class, 'store']);
Route::get('/profesor/create', [ProfesorController::class, 'create']);
Route::get('/profesor/{dpi}', [ProfesorController::class, 'show']);
Route::put('/profesor/{dpi}', [ProfesorController::class, 'update']);
Route::delete('/profesor/{id}', [ProfesorController::class, 'destroy']);


// Rutas de notas
Route::get('/notas/cursos-carreras', [NotaController::class, 'obtenerCursosYCarreras']);
Route::get('/notas', [NotaController::class, 'index']);
Route::get('/notas/create', [NotaController::class, 'create']);
Route::get('/notas/cursos/{carrera_id}', [NotaController::class, 'getCursosPorCarrera']);
Route::get('/notas/estudiantes/{carrera_id}/{curso_id}', [NotaController::class, 'getEstudiantesPorCursoYCarrera']);
Route::post('/notas', [NotaController::class, 'store']);
Route::get('/notas/{id}', [NotaController::class, 'show']);
Route::put('/notas/{id}', [NotaController::class, 'update']);
Route::delete('/notas/{id}', [NotaController::class, 'destroy']);
Route::get('/notas/{carrera_id}/{curso_id}/{alumno_id}', [NotaController::class, 'obtenerNotaEstudiante']);
Route::put('/api/notas/{alumno_id}', [NotaController::class, 'update']);

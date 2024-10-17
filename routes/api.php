<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\EstudianteController;

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

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome'); // Asegúrate de que esta vista exista
});

// Rutas de autenticación
Auth::routes();

// Rutas protegidas por autenticación
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/welcome', function () {
        return view('welcome'); 
    });
});



    // routes/web.php
    // Solo accesible para admin
    Route::get('/dashboard/admin', function () {
        return view('admin.administrador'); // Asegúrate de que esta es la ruta correcta
    })->name('dashboard.admin')->middleware('role:admin');

    // Solo accesible para teacher
    Route::get('/dashboard/teacher', function () {
        return view('admin.teacher'); // Asegúrate de que la vista admin.teacher existe
    })->name('dashboard.teacher')->middleware('role:teacher');

    // Solo accesible para student
    Route::get('/dashboard/student', function () {
        return view('admin.student'); // Asegúrate de que la vista admin.student existe
    })->name('dashboard.student')->middleware('role:student');


    Route::get('/', function () {
        return view('welcome');
    })->name('welcome')->middleware('guest'); // Solo accesible para usuarios no autenticados






// Ruta para la API que devuelve los cursos en JSON
Route::get('/api/cursos/{year}/{carrera}', [\App\Http\Controllers\CursoController::class, 'getCursos']);


// Ruta para la API que devuelve los cursos en JSON
Route::get('/api/cursos/{year}/{carrera}', [\App\Http\Controllers\CursoController::class, 'computacion']);


// Ruta para la API que devuelve los cursos en JSON
Route::get('/api/cursos/{year}/{carrera}', [\App\Http\Controllers\CursoController::class, 'cuartoPerito']);

// Ruta para la API que devuelve los cursos en JSON
Route::get('/api/cursos/{year}/{carrera}', [\App\Http\Controllers\CursoController::class, 'quintoPerito']);

// Ruta para la API que devuelve los cursos en JSON
Route::get('/api/cursos/{year}/{carrera}', [\App\Http\Controllers\CursoController::class, 'sextoPerito']);

// Ruta para la API que devuelve los cursos en JSON
Route::get('/api/cursos/{year}/{carrera}', [\App\Http\Controllers\CursoController::class, 'cuartoMagisterio']);

// Ruta para la API que devuelve los cursos en JSON
Route::get('/api/cursos/{year}/{carrera}', [\App\Http\Controllers\CursoController::class, 'quintoMagisterio']);

// Ruta para la API que devuelve los cursos en JSON
Route::get('/api/cursos/{year}/{carrera}', [\App\Http\Controllers\CursoController::class, 'sextoMagisterio']);

// Ruta para la API que devuelve los cursos en JSON
Route::get('/api/cursos/{year}/{carrera}', [\App\Http\Controllers\CursoController::class, 'cuartoSecretariado']);

// Ruta para la API que devuelve los cursos en JSON
Route::get('/api/cursos/{year}/{carrera}', [\App\Http\Controllers\CursoController::class, 'quintoSecretariado']);

// Ruta para la API que devuelve los cursos en JSON
Route::get('/api/cursos/{year}/{carrera}', [\App\Http\Controllers\CursoController::class, 'sextoSecretariado']);


Route::get('/carreras', [CarreraController::class, 'index']);
Route::get('/niveles', [NivelController::class, 'index']);
Route::get('/estados', [EstadoController::class, 'index']);


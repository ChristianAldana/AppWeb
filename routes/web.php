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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/computacion', function () {
    return view('computacion'); 
});
Route::get('/4tocomputacion', function () {
    return view('4tocomputacion');
});


Route::get('/perito', function () {
    return view('perito'); 
});
Route::get('/4toperito', function () {
    return view('4toperito');
});
Route::get('/6toperito', function () {
    return view('6toperito'); 
});




Route::get('/4tomagisterio', function () {
    return view('4tomagisterio'); 
});
Route::get('/magisterio', function () {
    return view('magisterio');
});
Route::get('/6tomagisterio', function () {
    return view('6tomagisterio'); 
});






Route::get('/4tosecretariado', function () {
    return view('4tosecretariado'); 
});
Route::get('/secretariado', function () {
    return view('secretariado');
});
Route::get('/6tosecretariado', function () {
    return view('6tosecretariado'); 
});





Route::get('/4tocomputacion', [\App\Http\Controllers\CursoController::class, 'index']);
Route::get('/computacion', [\App\Http\Controllers\CursoController::class, 'computacion']);




Route::get('/cuartoPerito', [\App\Http\Controllers\CursoController::class, 'cuartoPerito']);
Route::get('/perito', [\App\Http\Controllers\CursoController::class, 'quintoPerito']);
Route::get('/6toperito', [\App\Http\Controllers\CursoController::class, 'sextoPerito']);





Route::get('/4tomagisterio', [\App\Http\Controllers\CursoController::class, 'cuartoMagisterio']);
Route::get('/magisterio', [\App\Http\Controllers\CursoController::class, 'quintoMagisterio']);
Route::get('/6tomagisterio', [\App\Http\Controllers\CursoController::class, 'sextoMagisterio']);



Route::get('/4tosecretariado', [\App\Http\Controllers\CursoController::class, 'cuartoSecretariado']);
Route::get('/secretariado', [\App\Http\Controllers\CursoController::class, 'quintoSecretariado']);
Route::get('/6tosecretariado', [\App\Http\Controllers\CursoController::class, 'sextoSecretariado']);


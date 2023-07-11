<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('usuarios', UserController::class)->names('user');
Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{usuario}', [UserController::class, 'destroy'])->name('user.destroy');
Route::post('/usuarios/store', [UserController::class, 'store'])->name('user.store');
Route::put('/usuarios/{id}', [UsuariosController::class, 'update'])->name('usuarios.update');
Route::put('/usuarios', [UserController::class, 'update'])->name('usuarios.update');
Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/create', [UserController::class, 'create'])->name('user.create');




Route::get('/maestros', [MaestroController::class, 'index'])->name('maestros.index');
Route::put('/maestros/{id}', [MaestroController::class, 'update'])->name('maestros.update');

Route::get('/maestros/{maestro}/edit', [MaestroController::class, 'edit'])->name('maestros.edit');
Route::get('/maestros/{id}/edit', 'MaestroController@edit')->name('maestros.edit');
Route::delete('/maestros/{maestro}', [MaestroController::class, 'destroy'])->name('maestros.destroy');

Route::get('/maestros/create', [MaestroController::class, 'create'])->name('maestros.create');
Route::post('/maestros', [MaestroController::class, 'store'])->name('maestros.store');



Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos.index');
Route::get('/alumnos/create', [AlumnoController::class, 'create'])->name('alumnos.create');
Route::post('/alumnos', [AlumnoController::class, 'store'])->name('alumnos.store');
Route::get('/alumnos/{alumno}/edit', [AlumnoController::class, 'edit'])->name('alumnos.edit');
Route::put('/alumnos/{alumno}', [AlumnoController::class, 'update'])->name('alumnos.update');
Route::delete('/alumnos/{alumno}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy');

Route::get('/alumnos/create', [AlumnoController::class, 'create'])->name('alumnos.create');
Route::post('/alumnos', [AlumnoController::class, 'store'])->name('alumnos.store');



Route::get('/clases', [ClaseController::class, 'index'])->name('clases.index');
Route::delete('/clases/{clase}', [ClaseController::class, 'destroy'])->name('clases.destroy');
Route::get('/clases/{clase}/edit', [ClaseController::class, 'edit'])->name('clases.edit');
Route::put('/clases/{id}', [ClaseController::class, 'update'])->name('clases.update');


Route::get('clases/{id}/edit', 'ClaseController@edit')->name('clases.edit');
// Route::put('clases/{id}', 'ClaseController@update')->name('clases.update');

Route::get('/clases/create', [ClaseController::class, 'create'])->name('clases.create');
Route::post('/clases', [ClaseController::class, 'store'])->name('clases.store');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

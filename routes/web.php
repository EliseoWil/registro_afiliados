<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\usuarioController;
use App\Http\Controllers\EstudianteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Auth;
//default route
Route::get('/', function () {
    return view('login');
});
Route::post('/panel', [usuarioController::class, 'ctrIngresoUsuario']);
Route::get('/salir', [usuarioController::class, 'salir'])->name('usuario.salir');
Route::match(['get', 'post'], '/panel', [usuarioController::class, 'index']);
//RUTAS PARA USUARIOS
Route::get('/VUsuario', [usuarioController::class, 'index'])->name('usuario.index');
Route::get('/nuevo-usuario', [usuarioController::class, 'nuevoUsuario'])->name('nuevo-usuario');
Route::post('/crear-usuario', [usuarioController::class, 'store'])->name('crear-usuario');
Route::get('/eliminarUsuario/{id}', [usuarioController::class, 'eliminarUsuario'])->name('usuario.eliminarUsuario');
Route::get('/eliminar-usuario/{id}', [usuarioController::class, 'destroy'])->name('usuario.destroy');

//RUTAS PARA ESTUDIANTES
Route::get('/VEstudiante', [EstudianteController::class, 'index'])->name('estudiante.index');
Route::get('/nuevo-estudiante', [EstudianteController::class, 'nuevoEstudiante'])->name('nuevo-estudiante');
Route::post('/crear-estudiante', [EstudianteController::class, 'store'])->name('estudiante.store');
Route::get('/ver-estudiante/{id}', [EstudianteController::class, 'show'])->name('estudiante.show');
Route::get('/eliminarEstudiante/{id}', [EstudianteController::class, 'eliminarEstudiante'])->name('estudiante.eliminarEstudiante');
Route::get('/eliminar-estudiante/{id}', [EstudianteController::class, 'destroy'])->name('estudiante.destroy');
Route::get('/edit-estudiante/{id}', [EstudianteController::class, 'editEstudiante'])->name('estudiante.edit');
Route::post('/editar-estudiante', [EstudianteController::class, 'update'])->name('estudiante.update');

// rutas para personas
Route::get('/VPersona', [PersonaController::class, 'index'])->name('persona.index');
Route::get('/nuevo-persona', [PersonaController::class, 'nuevoPersona'])->name('persona.nuevoPersona');
Route::post('/crear-persona', [PersonaController::class, 'store'])->name('persona.store');
Route::get('/ver-persona/{id}', [PersonaController::class, 'show'])->name('persona.show');
Route::get('/eliminarPersona/{id}', [PersonaController::class, 'eliminarPersona'])->name('persona.eliminarPersona');
Route::get('/eliminar-persona/{id}', [PersonaController::class, 'destroy'])->name('persona.destroy');
Route::get('/edit-persona/{id}', [PersonaController::class, 'editPersona'])->name('persona.edit');
Route::post('/editar-persona', [PersonaController::class, 'updatePersona'])->name('persona.update');

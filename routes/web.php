<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\usuarioController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\EmpleadoController;

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
Route::get('/login', function () {
    return view('login');
});
//solicitud de acceso desde login
Route::post('/acceso', [usuarioController::class, 'ctrIngresoUsuario']);

Route::get('/salir', [usuarioController::class, 'salir'])->name('usuario.salir');
Route::get('/panel', [usuarioController::class, 'index']);
//Route::match(['get', 'post'], '/panel', [usuarioController::class, 'index']);

//RUTAS PARA USUARIOS
Route::get('/VUsuario', [usuarioController::class, 'ctrInfoUsuarios']);
Route::get('/nuevo-usuario', [usuarioController::class, 'nuevoUsuario']);
Route::post('/crear-usuario', [usuarioController::class, 'ctrRegUsuario']);
Route::get('/eliminarUsuario/{id}', [usuarioController::class, 'eliminarUsuario']);
Route::get('/eliminar-usuario/{id}', [usuarioController::class, 'destroy']);
Route::get('/edit-usuario/{id}', [usuarioController::class, 'editUsuario'])->name('usuario.edit');
Route::post('/editar-usuario', [usuarioController::class, 'update'])->name('usuario.update');


//RUTAS PARA ESTUDIANTES
Route::get('/VEstudiante', [EstudianteController::class, 'index'])->name('estudiante.index');
Route::get('/nuevo-estudiante', [EstudianteController::class, 'nuevoEstudiante'])->name('nuevo-estudiante');
Route::post('/crear-estudiante', [EstudianteController::class, 'store'])->name('estudiante.store');
Route::get('/ver-estudiante/{id}', [EstudianteController::class, 'show'])->name('estudiante.show');
Route::get('/eliminarEstudiante/{id}', [EstudianteController::class, 'eliminarEstudiante'])->name('estudiante.eliminarEstudiante');
Route::get('/eliminar-estudiante/{id}', [EstudianteController::class, 'destroy'])->name('estudiante.destroy');
Route::get('/edit-estudiante/{id}', [EstudianteController::class, 'editEstudiante'])->name('estudiante.edit');
Route::post('/editar-estudiante', [EstudianteController::class, 'update'])->name('estudiante.update');

//RUTAS PARA EMPLEADOS
Route::get('/VEmpleado', [EmpleadoController::class, 'index']);
/*Route::get('/nuevo-estudiante', [EstudianteController::class, 'nuevoEstudiante'])->name('nuevo-estudiante');
Route::post('/crear-estudiante', [EstudianteController::class, 'store'])->name('estudiante.store');
Route::get('/ver-estudiante/{id}', [EstudianteController::class, 'show'])->name('estudiante.show');
Route::get('/eliminarEstudiante/{id}', [EstudianteController::class, 'eliminarEstudiante'])->name('estudiante.eliminarEstudiante');
Route::get('/eliminar-estudiante/{id}', [EstudianteController::class, 'destroy'])->name('estudiante.destroy');
Route::get('/edit-estudiante/{id}', [EstudianteController::class, 'editEstudiante'])->name('estudiante.edit');
Route::post('/editar-estudiante', [EstudianteController::class, 'update'])->name('estudiante.update');*/

// rutas para personas
Route::get('/VPersona', [PersonaController::class, 'index'])->name('persona.index');
Route::get('/nuevo-persona', [PersonaController::class, 'nuevoPersona'])->name('persona.nuevoPersona');
Route::post('/crear-persona', [PersonaController::class, 'store'])->name('persona.store');
Route::get('/ver-persona/{id}', [PersonaController::class, 'show'])->name('persona.show');
Route::get('/eliminarPersona/{id}', [PersonaController::class, 'eliminarPersona'])->name('persona.eliminarPersona');
Route::get('/eliminar-persona/{id}', [PersonaController::class, 'destroy'])->name('persona.destroy');
Route::get('/edit-persona/{id}', [PersonaController::class, 'editPersona'])->name('persona.edit');
Route::post('/editar-persona', [PersonaController::class, 'updatePersona'])->name('persona.update');

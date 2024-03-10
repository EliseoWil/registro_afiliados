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
Route::get('/salir', [usuarioController::class, 'salir'])->name('usuario.salir');
Route::match(['get', 'post'], '/panel', [usuarioController::class, 'index']);
//prueba db
/* Route::get('/usuarios', [usuarioController::class, 'testdb']); */
Route::get('/VUsuario', [usuarioController::class, 'index'])->name('usuario.index');
Route::get('/nuevo-usuario', [usuarioController::class, 'nuevoUsuario'])->name('nuevo-usuario');
Route::post('/crear-usuario', [usuarioController::class, 'store'])->name('crear-usuario');
Route::post('/eliminarUsuario', [usuarioController::class, 'eliminarUsuario'])->name('usuario.eliminarUsuario');

// rutas para personas
Route::get('/VPersona', [PersonaController::class, 'index'])->name('persona.index');
Route::get('/nuevo-persona', [PersonaController::class, 'nuevoPersona'])->name('persona.nuevoPersona');
Route::post('/crear-persona', [PersonaController::class, 'store'])->name('persona.store');
Route::get('/ver-persona/{id}', [PersonaController::class, 'show'])->name('persona.show');
Route::get('/eliminarPersona/{id}', [PersonaController::class, 'eliminarPersona'])->name('persona.eliminarPersona');
Route::get('/eliminar-persona/{id}', [PersonaController::class, 'destroy'])->name('persona.destroy');
Route::get('/edit-persona/{id}', [PersonaController::class, 'editPersona'])->name('persona.edit');
Route::post('/editar-persona', [PersonaController::class, 'updatePersona'])->name('persona.update');

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

Route::get('/', function () {
    return view('login');
});
Route::post('/panel', [usuarioController::class, 'ctrIngresoUsuario'])->name('usuario.ingresoUsuario');
Route::get('/VEstudiante', [EstudianteController::class, 'index'])->name('estudiante.index');
Route::get('/nuevo-estudiante', [EstudianteController::class, 'nuevoEstudiante'])->name('nuevo-estudiante');

Route::get('/VPersona', [PersonaController::class, 'index'])->name('persona.index');
Route::get('nuevo-persona', [PersonaController::class, 'nuevoPersona'])->name('nuevo-persona');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\usuarioController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpresaControlador;

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
Route::get('/MFormCarnet/{id}', [EstudianteController::class, 'MFormCarnet']);
Route::post('/regCarnetEst/{cod}', [EstudianteController::class, 'regCarnetEst']);
Route::get('/MEditCarnetEstu/{cod}', [EstudianteController::class, 'MEditCarnetEstu']);
Route::post('/editCarnetEst/{cod}', [EstudianteController::class, 'editCarnetEst']);

//RUTAS PARA EMPLEADOS
Route::get('/VEmpleado', [EmpleadoController::class, 'index']);
Route::get('/nuevo-empleado', [EmpleadoController::class, 'nuevoEmpleado'])->name('nuevo-empleado');
Route::post('/crear-empleado', [EmpleadoController::class, 'regEmpleado'])->name('crear-empleado');
Route::get('/edit-empleado/{id}', [EmpleadoController::class, 'FEditEmpleado'])->name('formEditEmpleado');
Route::post('/editar-empleado', [EmpleadoController::class, 'editEmpleado'])->name('editEmpleado');
Route::get('/eliminarEmpleado/{id}', [EmpleadoController::class, 'eliminarEmpleado']);
Route::get('/verEmpleado/{id}', [EmpleadoController::class, 'verEmpleado']);
Route::get('/MFormCarnetEmp/{id}', [EmpleadoController::class, 'MFormCarnetEmp']);
Route::post('/regCarnetEmp/{cod}', [EmpleadoController::class, 'regCarnetEmp']);
Route::get('/MEditCarnetEmp/{cod}', [EmpleadoController::class, 'MEditCarnetEmp']);
Route::post('/editCarnetEmp/{cod}', [EmpleadoController::class, 'editCarnetEmp']);
Route::get('/ImpCarnetEmp/{id}', [EmpleadoController::class, 'ImpCarnet']);

// rutas para personas
Route::get('/VPersona', [PersonaController::class, 'index'])->name('persona.index');
Route::get('/nuevo-persona', [PersonaController::class, 'nuevoPersona'])->name('persona.nuevoPersona');
Route::post('/crear-persona', [PersonaController::class, 'store']);
Route::get('/ver-persona/{id}', [PersonaController::class, 'show']);
Route::get('/eliminarPersona/{id}', [PersonaController::class, 'eliminarPersona']);
Route::get('/eliminar-persona/{id}', [PersonaController::class, 'destroy']);
Route::get('/edit-persona/{id}', [PersonaController::class, 'editPersona']);
Route::post('/editar-persona/{id}', [PersonaController::class, 'updatePersona']);
Route::get('/MFormCarnetPer/{id}', [PersonaController::class, 'MFormCarnetPer']);
Route::post('/regCarnetPer/{cod}', [PersonaController::class, 'regCarnetPer']);
Route::get('/MEditCarnetPer/{cod}', [PersonaController::class, 'MEditCarnetPer']);
Route::post('/editCarnetPer/{cod}', [PersonaController::class, 'editCarnetPer']);
Route::get('/ImpCarnetPer/{id}', [PersonaController::class, 'ImpCarnet']);

// rutas para empresa
Route::get('/VEmpresa', [EmpresaControlador::class, 'index']);
Route::get('/MNuevaEmpresa', [EmpresaControlador::class, 'MNuevaEmpresa']);
Route::post('/regEmpresa', [EmpresaControlador::class, 'regEmpresa']);
Route::get('/MEditEmpresa/{id}', [EmpresaControlador::class, 'MEditEmpresa']);
Route::post('/editEmpresa/{id}', [EmpresaControlador::class, 'editEmpresa']);
Route::get('/eliminarEmpresa/{id}', [EmpresaControlador::class, 'eliminarEmpresa']);

//impresion carnet
Route::get('/ImpCarnet/{id}', [EstudianteController::class, 'ImpCarnet']);

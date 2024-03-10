<?php

namespace App\Http\Controllers;

use \DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class usuarioController extends Controller
{

  public function index()
  {
    $users = User::all();

    echo view('asideMenu');
    echo view('VUsuario', [
      'users' => $users
    ]);
    echo view('footer');
  }

  /* --------------------------------------
      FUNCIONES PARA REGISTRAR NUEVA USUARIO
    --------------------------------------*/
  public function nuevoUsuario()
  {
    return view('usuario.FNuevoUsuario');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    User::create([
      'nombre_usuario' => $request->input('usuario'),
      'login_usuario' => $request->input('login'),
      'password_usuario' => Hash::make($request->input('password')),
      'rol_usuario' => $request->input('rolUsuario'),
    ]);
    // Crear mensaje
    session()->flash('message', 'Registro exitoso');
    return redirect()->back();
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\User  $User
   * @return \Illuminate\Http\Response
   */
  public function show(User $User)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\User  $User
   * @return \Illuminate\Http\Response
   */
  public function edit(User $User)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\User  $User
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $User)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\User  $User
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $User)
  {
    //
  }

  public function ctrIngresoUsuario()
  {
    /* $usuario = $_POST['login_usuario'];
    $password = $_POST['password_usuario'];

    $consulta = User::where('login_usuario', $usuario)->where('password_usuario', $password)->first();

    if ($consulta) {
      $session = session();

      echo view('asideMenu');
      echo view('panelInicio');
      echo view('footer');
    } else {
      Session::flash('mensaje', ['credenciales' => 'Credenciales de acceso inválidas']);
      return redirect('/');
    } */

    $usuario = $_POST['login_usuario'];
    $password = $_POST['password_usuario'];

    $usuarioEncontrado = User::where('login_usuario', $usuario)->first();

    if ($usuarioEncontrado && Hash::check($password, $usuarioEncontrado->password_usuario)) {
      return redirect('/panel');
    } else {
      Session::flash('mensaje', ['credenciales' => 'Credenciales de acceso inválidas']);
      return redirect('/');
    }
  }

  public function ctrCrearUsuario()
  {
    echo view('asideMenu');
    echo view('usuario/FNuevoUsuario');
    echo view('footer');
  }

  public function testdb()
  {
    return User::all();
  }
}

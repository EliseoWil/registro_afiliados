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

  public function eliminarUsuario($id)
  {
    return view('usuario.FEliUsuario', compact('id'));
  }

  public function destroy(string $id)
  {
    $usuario = User::find($id);
    $usuario->delete();
    session()->flash('actualizado', 'Registro eliminado exitosamente');
    echo '<script>
            Swal.fire({
                icon: "success",
                showConfirmButton: false,
                title: "El Registro fue eliminado exitosamente",
                timer: 2000,
            });
            setTimeout(function() {
                window.location.href = "/VUsuario";
            }, 2000);
          </script>';
  }

  public function ctrIngresoUsuario()
  {
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

  public function salir()
  {
    Auth::logout();
    return redirect('/');
  }
}

<?php

namespace App\Http\Controllers;

use \DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class usuarioController extends Controller
{

  public function index()
  {
    $users = User::all();

    echo view('asideMenu');
    echo view('panelInicio');
    echo view('footer');
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
      return redirect('/login');
    }
  }
  
  public function ctrInfoUsuarios()
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

  public function ctrRegUsuario(Request $request)
  {

    // Validación de campos
    $validator = Validator::make($request->all(), [
      'password' => 'required|min:6',
      'password2' => 'required|same:password', // El campo password2 debe ser igual al campo password
      // Otros campos y reglas de validación...
    ]);


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

  public function show(User $User)
  {
    //
  }

  public function editUsuario(String $id)
  {
    $usuario = User::find($id);
    return view('usuario.FEditUsuario', [
      'usuario' => $usuario
    ]);
  }

  public function edit(User $User)
  {
    //
  }

  public function update(Request $request, User $usuario)
  {
    $id = $request->id_usuario;
    $usuario = User::find($id);

    if ($request->password == "") {
      $usuario->nombre_usuario = $request->input('usuario');
      $usuario->login_usuario = $request->input('login');
      $usuario->rol_usuario = $request->input('rolUsuario');
      $usuario->save();
    } else {
      $usuario->nombre_usuario = $request->input('usuario');
      $usuario->login_usuario = $request->input('login');
      $usuario->rol_usuario = $request->input('rolUsuario');
      $usuario->password_usuario = Hash::make($request->input('password'));
      $usuario->save();
    }

    session()->flash('actualizado', 'Registro actualizado exitosamente');
    return redirect()->back(); 
  }

  public function eliminarUsuario($id)
  {
    return view('usuario.FEliUsuario', compact('id'));
  }

  public function destroy(string $id)
  {
    $usuario = User::find($id);
    
    if($usuario->delete()==true){
      echo "ok";
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

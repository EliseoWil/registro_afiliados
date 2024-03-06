<?php

namespace App\Http\Controllers;

use \DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class usuarioController extends Controller
{
  public function ctrIngresoUsuario()
  {

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $consulta = User::where('login_usuario', $usuario)->where('password_usuario', $password)->first();

    if ($consulta) {

      $session = session();

      echo view('asideMenu');
      echo view('panelInicio');
      echo view('footer');
    } else {
      Session::flash('mensaje', ['credenciales' => 'Credenciales de acceso inválidas']);
      return redirect('/');
      
    }
  }

  public function testdb()
  {
    return User::all();
  }
}

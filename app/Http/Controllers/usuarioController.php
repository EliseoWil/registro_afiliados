<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use \DB;

class usuarioController extends Controller
{
    public function ctrIngresoUsuario(){
        
            /*$usuario = $_POST['usuario'];
            $password = $_POST['password'];*/

            echo view('asideMenu');
            echo view('panelInicio');
            echo view('footer');
            
       
    }
  
  public function testdb(){
    return User::all();
  }
}

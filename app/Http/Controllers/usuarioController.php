<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function ctrIngresoUsuario(){
        
        if (isset($_POST['usuario'])) {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            echo view('header');
            echo view('asideMenu');
            echo view('footer');
            
        }
       
    }
}

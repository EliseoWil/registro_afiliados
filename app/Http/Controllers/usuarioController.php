<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function ctrIngresoUsuario(){
        echo "www";
        if (isset($_POST['usuario'])) {
            echo $usuario = $_POST['usuario'];
            echo $password = $_POST['password'];
            view('panel');
        }
        view('panel');
    }
}

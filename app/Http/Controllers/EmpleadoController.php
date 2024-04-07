<?php

namespace App\Http\Controllers;

use App\Models\MEmpleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{

    public function index()
    {
        $empleados = MEmpleado::all();

        echo view('asideMenu');
        echo view('VEmpleado', [
            'empleados' => $empleados
        ]);
        echo view('footer');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use FPDF;

class EmpresaControlador extends Controller
{

  public function index()
  {
    $Empresas = Empresa::all();

    echo view('asideMenu');
    echo view('VEmpresa', [
      'Empresas' => $Empresas
    ]);
    echo view('footer');
  }

  public function MNuevaEmpresa()
  {

    return view('empresa.FNuevoEmpresa');
  }

  public function regEmpresa(Request $request)
  {

    Empresa::create([
      'nro_patronal' => $request->input('numPatronal'),
      'nombre_empresa' => $request->input('nomEmpresa'),
      'telefono_empresa' => $request->input('telEmpresa'),
      'direccion_empresa' => $request->input('dirEmpresa'),
      'email_empresa' => $request->input('emailEmpresa'),
      'observacion' => $request->input('observacion')
    ]);
    // Crear mensaje
    session()->flash('message', 'Registro exitoso');
    return redirect()->back();
  }

  public function MEditEmpresa($id)
  {
    $Empresa = Empresa::find($id);

    return view('empresa.FEditEmpresa', [
      'Empresa' => $Empresa
    ]);
  }

  public function editEmpresa(Request $request, $id)
  {
    $Empresa = Empresa::findOrFail($id);

    $Empresa->update([
      'nombre_empresa' => $request->input('nomEmpresa'),
      'telefono_empresa' => $request->input('telEmpresa'),
      'direccion_empresa' => $request->input('dirEmpresa'),
      'email_empresa' => $request->input('emailEmpresa'),
      'observacion' => $request->input('observacion'),
      'estado_empresa' => $request->input('estadoEmpresa')
    ]);
    
    session()->flash('actualizado', 'Registro actualizado exitosamente');
    return redirect()->back();
  }

  public function eliminarEmpresa($id)
  {
    $Empresa = Empresa::find($id);
    if($Empresa->delete()){
      echo "ok";
    }
  }

}

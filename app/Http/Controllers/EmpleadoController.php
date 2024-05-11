<?php

namespace App\Http\Controllers;

use App\Models\MEmpleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EmpleadoController extends Controller
{

  public function index()
  {
    $MEmpleado = new MEmpleado();
    $empleados = $MEmpleado->listaEmpleados();

    echo view('asideMenu');
    echo view('VEmpleado', [
      'empleados' => $empleados
    ]);
    echo view('footer');
  }

  public function nuevoEmpleado()
  {

    $empresas = DB::table('empresa')->get();
    $departamentos = DB::table('departamento')->get();
    $provincias = DB::table('provincia')->get();
    $localidades = DB::table('localidad')->get();
    $paises = DB::table('pais')->get();
    return view('empleado.FNuevoEmpleado',[
      "empresas"=>$empresas,
      "departamentos"=>$departamentos,
      "provincias"=>$provincias,
      "paises"=>$paises,
      "localidades"=>$localidades
    ]);
  }

  public function regEmpleado(Request $request){
    //recopilacion de datos para generar matricula
    $nombre=str_split(strtoupper($request->input('nombres')));
    $apPat=str_split(strtoupper($request->input('ap_paterno')));
    $apMat=str_split(strtoupper($request->input('ap_materno')));
    $nacimiento=str_split($request->input('nacimiento'));

    //equivalente de meses a numeros en caso de sexo femenino
    $mesFem=array(
      "01"=>51,
      "02"=>52,
      "03"=>53,
      "04"=>54,
      "05"=>55,
      "06"=>56,
      "07"=>57,
      "08"=>58,
      "09"=>59,
      "10"=>60,
      "11"=>61,
      "12"=>62
    );

    if($request->input('sexo')=="Masculino"){
      $codAsegurado=$nacimiento[2].$nacimiento[3]."-".$nacimiento[5].$nacimiento[6].$nacimiento[8].$nacimiento[9]."-".$apPat[0].$apMat[0].$nombre[0];
    }else{
      $mes="";
      $mesNaci=$nacimiento[5].$nacimiento[6];
      foreach($mesFem as $key=>$value){
        if($mesNaci==$key){
          $mes=$value;
        }
      }
      $codAsegurado=$nacimiento[2].$nacimiento[3]."-".$mes.$nacimiento[8].$nacimiento[9]."-".$apPat[0].$apMat[0].$nombre[0];
    }

    //registro de empleado
    MEmpleado::create([
      'nombre_empleado' => $request->input('nombres'),
      'ap_paterno' => $request->input('ap_paterno'),
      'ap_materno' => $request->input('ap_materno'),
      'ci_empleado' => $request->input('ci'),
      'complemento' => $request->input('comple'),
      'lugar_emision' => $request->input('emision'),
      'direccion' => $request->input('direccion'),      
      'fecha_nacimiento' => $request->input('nacimiento'),
      'cargo' => $request->input('cargo'),
      'profesion' => $request->input('profesion'),
      'salario' => $request->input('salario'),
      'fecha_ingreso_laboral' => $request->input('fechaIngreso'),
      'sexo' => $request->input('sexo'),
      'estado_civil' => $request->input('estadoCivil'),
      'contactos_empleado' => $request->input('contacto'),
      'id_empresa' => $request->input('empresa'),
      'pais' => $request->input('pais'),
      'departamento' => $request->input('departamento'),
      'provincia' => $request->input('provincia'),
      'localidad' => $request->input('localidad'),
      'cod_asegurado' => $codAsegurado,
    ]);
    // Crear mensaje
    session()->flash('message', 'Registro exitoso');
    return redirect()->back();
  }
  
  public function FEditEmpleado(String $id){
    
    $empleado = MEmpleado::find($id);
    $empresas = DB::table('empresa')->get();
    $departamentos = DB::table('departamento')->get();
    $provincias = DB::table('provincia')->get();
    $localidades = DB::table('localidad')->get();
    $paises = DB::table('pais')->get();
    return view('empleado.FEditEmpleado',[
      "empleado"=>$empleado,
      "empresas"=>$empresas,
      "departamentos"=>$departamentos,
      "provincias"=>$provincias,
      "paises"=>$paises,
      "localidades"=>$localidades
    ]);
  }

}

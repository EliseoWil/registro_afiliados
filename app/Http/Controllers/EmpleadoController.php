<?php

namespace App\Http\Controllers;

use App\Models\MEmpleado;
use App\Models\Carnet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use FPDF;

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

  public function editEmpleado(Request $request){
    $id=$request->input("idEmpleado");
    $empleado = MEmpleado::find($id);


    $empleado->nombre_empleado = $request->input('nombres');
    $empleado->ap_paterno = $request->input('ap_paterno');
    $empleado->ap_materno = $request->input('ap_materno');
    $empleado->ci_empleado = $request->input('ci');
    $empleado->complemento = $request->input('comple');
    $empleado->lugar_emision = $request->input('emision');
    $empleado->direccion = $request->input('direccion');      
    $empleado->fecha_nacimiento = $request->input('nacimiento');
    $empleado->cargo = $request->input('cargo');
    $empleado->profesion = $request->input('profesion');
    $empleado->salario = $request->input('salario');
    $empleado->fecha_ingreso_laboral = $request->input('fechaIngreso');
    $empleado->sexo = $request->input('sexo');
    $empleado->estado_civil = $request->input('estadoCivil');
    $empleado->contactos_empleado = $request->input('contacto');
    $empleado->id_empresa = $request->input('empresa');
    $empleado->pais = $request->input('pais');
    $empleado->departamento = $request->input('departamento');
    $empleado->provincia = $request->input('provincia');
    $empleado->localidad = $request->input('localidad');
    $empleado->save();

    session()->flash('actualizado', 'Registro actualizado exitosamente');
    return redirect()->back();
  }

  public function eliminarEmpleado($id)
  {

    $empleado = MEmpleado::find($id);
    if($empleado->delete()){
      echo "ok";
    }
  }

  public function verEmpleado($id){
    $MEmpleado = new MEmpleado();
    $empleado = $MEmpleado->verEmpleado($id);

    return view('empleado.FVerEmpleado', [
      'empleado' => $empleado
    ]);
  }

  /*=============
  carnet
  =============*/
  public function MFormCarnetEmp($id)
  {
    $empleado = MEmpleado::find($id);
    return view('empleado.FNuevoCarnetEmp',[
      "empleado"=>$empleado
    ]);
  }

  public function regCarnetEmp(Request $request, $cod)
  {

    //cargar imagen
    if($request->file('imgEmpleado')!=null){
      $imagen=$request->file('imgEmpleado');
      $imgNombre= $imagen->getClientOriginalName();
      $imgTmp=$imagen->getRealPath();
      $imagen->move("./assets/dist/img/empleado/", $imgNombre);
    }else{
      $imgNombre="";
    }


    Carnet::create([
      'fecha_emision' => $request->input('fechaEmision'),
      'fecha_vencimiento' => $request->input('fechaVencimiento'),
      'gestion' => $request->input('gestion'),
      'fotografia' => $imgNombre,
      'cod_asegurado' => $cod,
      'cod_asegurado_prov' => $cod
    ]);

    session()->flash('message', 'Registro exitoso');
    return redirect()->back();
  }

  public function ImpCarnet($id)
  {
    $MEmpleado = new MEmpleado();
    $Empleado = $MEmpleado->verEmpleado($id);

    $carnet=Carnet::where('cod_asegurado', $Empleado["cod_asegurado"])->first();

    require_once "app/fpdf/fpdf.php";

    $pdf = new FPDF();
    $pdf->AddPage();

    // Establecer el fondo anverso en la primera página
    $pdf->Image('http://localhost/registro_afiliados/assets/dist/img/carnet_asegurado_A.jpg', 20, 20, 160, 80);

    // Título
    $pdf->SetFont('Arial', 'B', 12);

    // datos

    /*
    $pdf->SetXY(75, 47);
    $pdf->Cell(50, 10, $Empleado["ci_empleado"], 0, 0, 'L');
*/

    $pdf->SetXY(75, 46);
    $pdf->Cell(50, 10, $Empleado["nombre_empleado"]." ".$Empleado["ap_paterno"], 0, 0, 'L');

    $pdf->SetXY(75, 51);
    $pdf->Cell(50, 10, $Empleado["carnet_de_asegurado"], 0, 0, 'L');

    $pdf->SetXY(75, 65.5);
    $pdf->Cell(50, 10, $Empleado["nombre_empresa"], 0, 0, 'L');


    //imagen para la fotografia
    $pdf->Image('http://localhost/registro_afiliados/assets/dist/img/Empleado/'.$carnet["fotografia"], 139, 48, 33, 25);

    // Agregar una nueva página para la segunda imagen
    $pdf->AddPage();

    // Establecer el fondo reverso en la segunda página
    $pdf->Image('http://localhost/registro_afiliados/assets/dist/img/carnet_asegurado_B.jpg', 20, 20, 160, 80);

 /*   $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetXY(85, 20.5);
    $pdf->Cell(50, 10, $Empleado["nombre_empleado"]." ".$Empleado["ap_paterno"], 0, 0, 'L');

    $pdf->SetXY(85, 25.5);
    $pdf->Cell(50, 10, $Empleado["carnet_de_asegurado"], 0, 0, 'L');

    $pdf->SetXY(85, 31);
    $pdf->Cell(50, 10, $Empleado["nombre_empresa"], 0, 0, 'L');*/

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetXY(58, 31);
    $pdf->Cell(50, 10, $carnet["fecha_emision"], 0, 0, 'L');

    $pdf->SetXY(125, 31);
    $pdf->Cell(50, 10, $carnet["fecha_vencimiento"], 0, 0, 'L');
    // Enviar encabezados para indicar al navegador que debe abrir el PDF en una nueva pestaña
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="carnet.pdf"');

    // Generar y mostrar el PDF en línea en una nueva pestaña
    $pdf->Output('I');
    exit;
  }

  public function MEditCarnetEmp($cod){
    $carnet = Carnet::where('cod_asegurado', $cod)->first();

    return view('empleado.FEditCarnetEmp',[
      "carnet"=>$carnet
    ]);
  }

  public function editCarnetEmp(Request $request, $cod){

    $carnet = Carnet::where('cod_asegurado', $cod)->first();

    //cargar imagen
    if($request->file('imgEmpleado')!=null){
      $imagen=$request->file('imgEmpleado');
      $imgNombre= $imagen->getClientOriginalName();
      $imgTmp=$imagen->getRealPath();
      $imagen->move("./assets/dist/img/empleado/", $imgNombre);
    }else{
      $imgNombre=$request->input('imgEmpleadoActual');
    }

    $carnet->fecha_emision  = $request->input('fechaEmision');
    $carnet->fecha_vencimiento  = $request->input('fechaVencimiento');
    $carnet->gestion  = $request->input('gestion');
    $carnet->fotografia  = $imgNombre;
    $carnet->estado_carnet  = $request->input('estadoCarnet');

    $carnet->save();

    session()->flash('actualizado', 'Registro actualizado exitosamente');
    return redirect()->back();
  }

}

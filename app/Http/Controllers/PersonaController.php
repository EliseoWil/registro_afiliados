<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Carnet;
use App\Models\MEmpleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use FPDF;
class PersonaController extends Controller
{

  public function index()
  {
    $personas = Persona::all();

    echo view('asideMenu');
    echo view('VPersona', [
      'personas' => $personas
    ]);
    echo view('footer');
  }

  public function nuevoPersona()
  {
    $departamentos = DB::table('departamento')->get();
    $provincias = DB::table('provincia')->get();
    $localidades = DB::table('localidad')->get();
    $paises = DB::table('pais')->get();

    return view('persona.FNuevoPersona',[
      "departamentos"=>$departamentos,
      "provincias"=>$provincias,
      "paises"=>$paises,
      "localidades"=>$localidades
    ]);
  }

  public function store(Request $request)
  {
    $nombre=str_split(strtoupper($request->input('nombres')));
    $apPat=str_split(strtoupper($request->input('ap_paterno')));
    $apMat=str_split(strtoupper($request->input('ap_materno')));
    $nacimiento=str_split($request->input('nacimiento'));

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

    Persona::create([
      'ci_persona' => $request->input('ci'),
      'complemento' => $request->input('comple'),
      'lugar_emision' => $request->input('emision'),
      'nombre_persona' => $request->input('nombres'),
      'ap_paterno' => $request->input('ap_paterno'),
      'ap_materno' => $request->input('ap_materno'),
      'direccion' => $request->input('direccion'),
      'fecha_nacimiento' => $request->input('nacimiento'),
      'factor' => $request->input('factor'),
      'grupo' => $request->input('grupo'),
      'sexo' => $request->input('sexo'),
      'estado_civil_pers' => $request->input('estadoCivil'),
      'contactos_persona' => $request->input('celular'),
      'datos_referencia' => $request->input('referencia'),
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

  public function show($id)
  {

    $persona = new Persona();
    $VerPersona = $persona->verPersona($id);
    return view('persona.FVerPersona', [
      'persona' => $VerPersona
    ]);
  }

  public function editPersona(String $id)
  {
    $departamentos = DB::table('departamento')->get();
    $provincias = DB::table('provincia')->get();
    $localidades = DB::table('localidad')->get();
    $paises = DB::table('pais')->get();

    $persona = new Persona();
    $VerPersona = $persona->verPersona($id);

    return view('persona.FEditPersona', [
      'persona' => $VerPersona,
      "departamentos"=>$departamentos,
      "provincias"=>$provincias,
      "paises"=>$paises,
      "localidades"=>$localidades
    ]);
  }

  public function updatePersona($id, Request $request)
  {

    $persona = Persona::find($id);

    $persona->ci_persona  = $request->input('ci');
    $persona->complemento  = $request->input('comple');
    $persona->lugar_emision  = $request->input('emision');
    $persona->nombre_persona  = $request->input('nombres');
    $persona->ap_paterno  = $request->input('ap_paterno');
    $persona->ap_materno  = $request->input('ap_materno');
    $persona->direccion  = $request->input('direccion');
    $persona->fecha_nacimiento  = $request->input('nacimiento');
    $persona->factor  = $request->input('factor');
    $persona->grupo  = $request->input('grupo');
    $persona->sexo  = $request->input('sexo');
    $persona->estado_civil_pers  = $request->input('estadoCivil');
    $persona->contactos_persona  = $request->input('celular');
    $persona->datos_referencia  = $request->input('referencia');
    $persona->pais  = $request->input('pais');
    $persona->departamento  = $request->input('departamento');
    $persona->provincia  = $request->input('provincia');
    $persona->localidad  = $request->input('localidad');
    $persona->save();

    session()->flash('actualizado', 'Registro actualizado exitosamente');
    return redirect()->back();


  }

  public function eliminarPersona($id)
  {
    return view('persona.FEliPersona', compact('id'));
  }

  public function destroy(string $id)
  {
    $persona = Persona::find($id);

    if($persona->delete()){
      echo "ok";
    }

  }

  /*=============
  carnet
  =============*/
  public function MFormCarnetPer($id)
  {
    $empleados = MEmpleado::all();
    $persona = Persona::find($id);
    return view('persona.FNuevoCarnetPer',[
      "persona"=>$persona,
      "empleados"=>$empleados
    ]);
  }

  public function regCarnetPer(Request $request, $cod)
  {

    //cargar imagen
    if($request->file('imgPersona')!=null){
      $imagen=$request->file('imgPersona');
      $imgNombre= $imagen->getClientOriginalName();
      $imgTmp=$imagen->getRealPath();
      $imagen->move("./assets/dist/img/persona/", $imgNombre);
    }else{
      $imgNombre="";
    }

    echo $request->input('beneficiario');
    Carnet::create([
      'fecha_emision' => $request->input('fechaEmision'),
      'fecha_vencimiento' => $request->input('fechaVencimiento'),
      'gestion' => $request->input('gestion'),
      'fotografia' => $imgNombre,
      'cod_asegurado' => $cod,
      'cod_asegurado_prov' => $request->input('beneficiario')
    ]);

    session()->flash('message', 'Registro exitoso');
    return redirect()->back();
  }

  public function ImpCarnet($id)
  {
    $MPersona = new Persona();
    $persona = $MPersona->verPersona($id);

    $carnet=Carnet::where('cod_asegurado', $persona["cod_asegurado"])->first();

    require_once "app/fpdf/fpdf.php";

    $pdf = new FPDF();
    $pdf->AddPage();

    // Establecer el fondo anverso en la primera página
    $pdf->Image('http://localhost/registro_afiliados/assets/dist/img/carnet_beneficiario_A.jpg', 20, 20, 160, 80);

    // Título
    $pdf->SetFont('Arial', 'B', 12);

    // datos


    $pdf->SetXY(75, 46);
    $pdf->Cell(50, 10, $persona["nombre_persona"]." ".$persona["ap_paterno"], 0, 0, 'L');

    $pdf->SetXY(75, 51);
    $pdf->Cell(50, 10, $persona["carnet_de_asegurado"], 0, 0, 'L');

    $pdf->SetXY(75, 55);
    $pdf->Cell(50, 10, $persona["grupo"], 0, 0, 'L');


    //imagen para la fotografia
    $pdf->Image('http://localhost/registro_afiliados/assets/dist/img/persona/'.$carnet["fotografia"], 139, 48, 33, 25);

    // Agregar una nueva página para la segunda imagen
    $pdf->AddPage();

    // Establecer el fondo reverso en la segunda página
    $pdf->Image('http://localhost/registro_afiliados/assets/dist/img/carnet_beneficiario_B.jpg', 20, 20, 160, 80);

/*    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetXY(85, 20.5);
    $pdf->Cell(50, 10, $persona["nombre_persona"]." ".$Empleado["ap_paterno"], 0, 0, 'L');

    $pdf->SetXY(85, 25.5);
    $pdf->Cell(50, 10, $persona["carnet_de_asegurado"], 0, 0, 'L');

    $pdf->SetXY(85, 31);
    $pdf->Cell(50, 10, $persona["nombre_empresa"], 0, 0, 'L');*/

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

  public function MEditCarnetPer($cod){
    $carnet = Carnet::where('cod_asegurado', $cod)->first();
    $empleados = MEmpleado::all();
    
    return view('persona.FEditCarnetPer',[
      "carnet"=>$carnet,
      "empleados"=>$empleados
    ]);
  }

  public function editCarnetPer(Request $request, $cod){

    $carnet = Carnet::where('cod_asegurado', $cod)->first();

    //cargar imagen
    if($request->file('imgPersona')!=null){
      $imagen=$request->file('imgPersona');
      $imgNombre= $imagen->getClientOriginalName();
      $imgTmp=$imagen->getRealPath();
      $imagen->move("./assets/dist/img/persona/", $imgNombre);
    }else{
      $imgNombre=$request->input('imgPersonaActual');
    }

    $carnet->fecha_emision  = $request->input('fechaEmision');
    $carnet->fecha_vencimiento  = $request->input('fechaVencimiento');
    $carnet->gestion  = $request->input('gestion');
    $carnet->fotografia  = $imgNombre;
    $carnet->estado_carnet  = $request->input('estadoCarnet');
    $carnet->cod_asegurado_prov  = $request->input('beneficiario');

    $carnet->save();

    session()->flash('actualizado', 'Registro actualizado exitosamente');
    return redirect()->back();
  }

}

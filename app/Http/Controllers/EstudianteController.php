<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Carnet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use FPDF;

class EstudianteController extends Controller
{

  public function index()
  {
    $estudiante = new Estudiante();
    $estudiantes = $estudiante->listaEstudiantes();

    echo view('asideMenu');
    echo view('VEstudiante', [
      'estudiantes' => $estudiantes
    ]);
    echo view('footer');
  }

  public function nuevoEstudiante()
  {
    $universidades = DB::table('universidad')->get();
    $departamentos = DB::table('departamento')->get();
    $provincias = DB::table('provincia')->get();
    $localidades = DB::table('localidad')->get();
    $paises = DB::table('pais')->get();
    return view('estudiante.FNuevoEstudiante',[
      "universidades"=>$universidades,
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

    Estudiante::create([
      'ci_estudiante' => $request->input('ci'),
      'complemento' => $request->input('comple'),
      'lugar_emision' => $request->input('emision'),
      'nombre_estu' => $request->input('nombres'),
      'ap_paterno_estu' => $request->input('ap_paterno'),
      'ap_materno_estu' => $request->input('ap_materno'),
      'direccion_estu' => $request->input('direccion'),
      'fecha_nacimiento' => $request->input('nacimiento'),
      'sexo_estu' => $request->input('sexo'),
      'contactos_estu' => $request->input('celular'),
      'ru' => $request->input('ru'),
      'curso' => $request->input('curso'),
      'estado_civil' => $request->input('estadoCivil'),
      'observacion' => $request->input('observacion'),
      'id_universidad' => $request->input('universidad'),
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
    $estudiante = new Estudiante();
    $VerEstudiante = $estudiante->verEstudiantes($id);

    return view('estudiante.FVerEstudiante', [
      'estudiante' => $VerEstudiante
    ]);
  }

  public function editEstudiante(String $id)
  {
    $estudiante = Estudiante::find($id);
    $universidades = DB::table('universidad')->get();
    $departamentos = DB::table('departamento')->get();
    $provincias = DB::table('provincia')->get();
    $localidades = DB::table('localidad')->get();
    $paises = DB::table('pais')->get();
    return view('estudiante.FEditEstudiante', [
      'estudiante' => $estudiante,
      "universidades"=>$universidades,
      "departamentos"=>$departamentos,
      "provincias"=>$provincias,
      "paises"=>$paises,
      "localidades"=>$localidades
    ]);
  }

  public function update(Request $request, Estudiante $estudiante)
  {
    $id = $request->id_estudiante;
    $estudiante = Estudiante::find($id);

    $estudiante->ci_estudiante  = $request->input('ci');
    $estudiante->complemento  = $request->input('comple');
    $estudiante->lugar_emision  = $request->input('emision');
    $estudiante->nombre_estu  = $request->input('nombres');
    $estudiante->ap_paterno_estu  = $request->input('ap_paterno');
    $estudiante->ap_materno_estu  = $request->input('ap_materno');
    $estudiante->direccion_estu  = $request->input('direccion');
    $estudiante->fecha_nacimiento  = $request->input('nacimiento');
    $estudiante->sexo_estu  = $request->input('sexo');
    $estudiante->contactos_estu  = $request->input('celular');
    $estudiante->ru  = $request->input('ru');
    $estudiante->curso  = $request->input('curso');
    $estudiante->estado_civil  = $request->input('estadoCivil');
    $estudiante->observacion  = $request->input('observacion');
    $estudiante->id_universidad  = $request->input('universidad');
    $estudiante->pais  = $request->input('pais');
    $estudiante->departamento  = $request->input('departamento');
    $estudiante->provincia  = $request->input('provincia');
    $estudiante->localidad  = $request->input('localidad');
    $estudiante->cod_asegurado  = $request->input('codAsegurado');
    $estudiante->save();

    session()->flash('actualizado', 'Registro actualizado exitosamente');
    return redirect()->back();
  }

  public function eliminarEstudiante($id)
  {

    $persona = Estudiante::find($id);
    if($persona->delete()){
      echo "ok";
    }
  }

  /*==============
  carnet
  ===============*/
  public function MFormCarnet($id){
    $estudiante = Estudiante::find($id);
    return view('estudiante.FNuevoCarnetEst',[
      "estudiante"=>$estudiante
    ]);
  }

  public function regCarnetEst(Request $request, $cod){

    //cargar imagen
    if($request->file('imgEstudiante')!=null){
      $imagen=$request->file('imgEstudiante');
      $imgNombre= $imagen->getClientOriginalName();
      $imgTmp=$imagen->getRealPath();
      $imagen->move("./assets/dist/img/estudiante/", $imgNombre);
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
    $MEstudiante = new Estudiante();
    $estudiante = $MEstudiante->InfoEstudiante($id);
    
    $carnet=Carnet::where('cod_asegurado', $estudiante["cod_asegurado"])->first();

    require_once "app/fpdf/fpdf.php";

    $pdf = new FPDF();
    $pdf->AddPage();

    // Establecer el fondo anverso en la primera página
    $pdf->Image('http://localhost/registro_afiliados/assets/dist/img/carnet_estudiante_A.jpg', 20, 20, 160, 80);

    // Título
    $pdf->SetFont('Arial', 'B', 12);

    // datos
    $pdf->SetXY(40, 47);
    $pdf->Cell(50, 10, $estudiante["ru"], 0, 0, 'L');

    $pdf->SetXY(77, 47);
    $pdf->Cell(50, 10, $estudiante["ci_estudiante"], 0, 0, 'L');

    $pdf->SetXY(60, 56);
    $pdf->Cell(50, 10, $estudiante["nombre_estu"], 0, 0, 'L');

    $pdf->SetXY(60, 64);
    $pdf->Cell(50, 10, $estudiante["ap_paterno_estu"], 0, 0, 'L');

    $pdf->SetXY(60, 72);
    $pdf->Cell(50, 10, $estudiante["curso"], 0, 0, 'L');

    $pdf->SetXY(60, 80);
    $pdf->Cell(50, 10, $carnet["gestion"], 0, 0, 'L');

    //imagen para la fotografia
    $pdf->Image('http://localhost/registro_afiliados/assets/dist/img/estudiante/'.$carnet["fotografia"], 127, 59, 40, 30);
    
    // Agregar una nueva página para la segunda imagen
    $pdf->AddPage();

    // Establecer el fondo reverso en la segunda página
    $pdf->Image('http://localhost/registro_afiliados/assets/dist/img/carnet_estudiante_B.jpg', 20, 20, 160, 80);

    $pdf->SetXY(60, 34);
    $pdf->Cell(50, 10, $carnet["fecha_emision"], 0, 0, 'L');
    
    $pdf->SetXY(115, 34);
    $pdf->Cell(50, 10, $carnet["fecha_vencimiento"], 0, 0, 'L');
    // Enviar encabezados para indicar al navegador que debe abrir el PDF en una nueva pestaña
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="carnet.pdf"');

    // Generar y mostrar el PDF en línea en una nueva pestaña
    $pdf->Output('I');
    exit;
  }

  public function MEditCarnetEstu($cod){
    $carnet = Carnet::where('cod_asegurado', $cod)->first();

    return view('estudiante.FEditCarnetEst',[
      "carnet"=>$carnet
    ]);
  }
  
  public function editCarnetEst(Request $request, $cod){
    
    $carnet = Carnet::where('cod_asegurado', $cod)->first();
    
    //cargar imagen
    if($request->file('imgEstudiante')!=null){
      $imagen=$request->file('imgEstudiante');
      $imgNombre= $imagen->getClientOriginalName();
      $imgTmp=$imagen->getRealPath();
      $imagen->move("./assets/dist/img/estudiante/", $imgNombre);
    }else{
      $imgNombre=$request->input('imgEstudianteActual');
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

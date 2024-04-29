<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

  public function edit(Estudiante $estudiante)
  {
    //
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
    return view('estudiante.FEliEstudiante', compact('id'));
  }
  //
  public function destroy(string $id)
  {
    $persona = Estudiante::find($id);
    $persona->delete();
    session()->flash('eliminado', 'Registro eliminado exitosamente');
    echo '<script>
            Swal.fire({
                icon: "success",
                showConfirmButton: false,
                title: "El Registro fue eliminado exitosamente",
                timer: 2000,
            });
            setTimeout(function() {
                location.reload()
            }, 2000);
          </script>';
  }
}

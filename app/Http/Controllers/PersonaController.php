<?php

namespace App\Http\Controllers;

use App\Models\Persona;
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
    $persona = Persona::find($id);
    return view('persona.FVerPersona', [
      'persona' => $persona
    ]);
  }

  public function editPersona(String $id)
  {
    $persona = Persona::find($id);
    return view('persona.FEditPersona', [
      'persona' => $persona
    ]);
  }

  public function updatePersona(Request $request)
  {
    $id = $request->id_persona;
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
    $persona->cod_asegurado  = $request->input('codAsegurado');
    $persona->save();

    session()->flash('actualizado', 'Registro actualizado exitosamente');
    return redirect()->back();

    /* return $id; */
  }

  public function eliminarPersona($id)
  {
    return view('persona.FEliPersona', compact('id'));
  }

  public function destroy(string $id)
  {
    $persona = Persona::find($id);
    $persona->delete();
    session()->flash('actualizado', 'Registro eliminado exitosamente');
    echo '<script>
            Swal.fire({
                icon: "success",
                showConfirmButton: false,
                title: "El Registro fue eliminado exitosamente",
                timer: 2000,
            });
            setTimeout(function() {
                window.location.href = "/VPersona";
            }, 2000);
          </script>';
  }
}

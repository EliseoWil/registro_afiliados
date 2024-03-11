<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::all();

        echo view('asideMenu');
        echo view('VEstudiante', [
            'estudiantes' => $estudiantes
        ]);
        echo view('footer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nuevoEstudiante()
    {
        return view('estudiante.FNuevoEstudiante');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            'cod_asegurado' => $request->input('codAsegurado'),
        ]);
        // Crear mensaje
        session()->flash('message', 'Registro exitoso');
        return redirect()->back();
    }


    public function show($id)
    {
        $estudiante = Estudiante::find($id);
        return view('estudiante.FVerEstudiante', [
            'estudiante' => $estudiante
        ]);
    }

    
    public function editEstudiante(String $id)
    {
        $estudiante = Estudiante::find($id);
        return view('estudiante.FEditEstudiante', [
            'estudiante' => $estudiante
        ]);
    }

    public function edit(Estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $id = $request->id_persona;
        $persona = Estudiante::find($id);

/*         $persona->ci_persona  = $request->input('ci');
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
        $persona->cod_asegurado  = $request->input('codAsegurado'); */
        $persona->save();
    
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
                window.location.href = "/VEstudiante";
            }, 2000);
          </script>';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
  protected $table = "estudiante";
  protected $primaryKey = "id_estudiante";
  public $timestamps = false;
  use HasFactory;
  use HasFactory;

  protected $fillable = [
    'ci_estudiante',
    'complemento',
    'lugar_emision',
    'nombre_estu',
    'ap_paterno_estu',
    'ap_materno_estu',
    'direccion_estu',
    'fecha_nacimiento',
    'sexo_estu',
    'contactos_estu',
    'ru',
    'curso',
    'estado_civil',
    'observacion',
    'id_universidad',
    'pais',
    'departamento',
    'provincia',
    'localidad',
    'cod_asegurado'
  ];


  public function listaEstudiantes(){
    return $this->select('id_estudiante', 'nombre_estu', 'ap_paterno_estu', 'ap_materno_estu', 'ru', 'curso', 'cod_asegurado', 'nombre_pais', 'nombre_universidad')
      ->leftJoin('universidad', 'universidad.id_universidad', '=', 'estudiante.id_universidad')
      ->leftJoin('pais', 'pais.id_pais', '=', 'estudiante.pais')
      ->get();

  }

  public function verEstudiantes($id){
    $resultado = $this->select(
      'estudiante.id_estudiante', 
      'estudiante.ci_estudiante', 
      'estudiante.complemento', 
      'estudiante.lugar_emision', 
      'estudiante.nombre_estu', 
      'estudiante.ap_paterno_estu', 
      'estudiante.ap_materno_estu', 
      'estudiante.ru', 
      'estudiante.curso', 
      'estudiante.cod_asegurado', 
      'pais.nombre_pais', 
      'universidad.nombre_universidad', 
      'estudiante.fecha_nacimiento', 
      'estudiante.estado_civil', 
      'estudiante.sexo_estu', 
      'estudiante.direccion_estu', 
      'estudiante.contactos_estu', 
      'departamento.nombre_departamento', 
      'provincia.nombre_provincia', 
      'localidad.nombre_localidad', 
      'estudiante.observacion',
      'carnet_seguro.cod_asegurado AS carnet_de_asegurado'
    )
      ->leftJoin('universidad', 'universidad.id_universidad', '=', 'estudiante.id_universidad')
      ->leftJoin('pais', 'pais.id_pais', '=', 'estudiante.pais')
      ->leftJoin('departamento', 'departamento.id_departamento', '=', 'estudiante.departamento')
      ->leftJoin('localidad', 'localidad.id_localidad', '=', 'estudiante.localidad')
      ->leftJoin('provincia', 'provincia.id_provincia', '=', 'estudiante.provincia')
      ->leftJoin('carnet_seguro', 'carnet_seguro.cod_asegurado', '=', 'estudiante.cod_asegurado')
      ->where('estudiante.id_estudiante', $id)
      ->get()
      ->toArray();

    if (!empty($resultado)) {
      return $resultado[0];
    }

    return null;
  }

  public function InfoEstudiante($id){
    $resultado= $this->select('id_estudiante', 'ci_estudiante', 'complemento', 'lugar_emision','nombre_estu','ap_paterno_estu','ap_materno_estu','ru','curso','cod_asegurado','nombre_pais','nombre_universidad','fecha_nacimiento','estado_civil','sexo_estu','direccion_estu','contactos_estu','nombre_departamento','nombre_provincia','nombre_localidad','observacion')

      ->join('universidad', 'universidad.id_universidad', '=', 'estudiante.id_universidad')
      ->join('pais', 'pais.id_pais', '=', 'estudiante.pais')
      ->join('departamento', 'departamento.id_departamento', '=' ,'estudiante.departamento')
      ->join('localidad', 'localidad.id_localidad', '=', 'estudiante.localidad')
      ->join('provincia', 'provincia.id_provincia', '=', 'estudiante.provincia')

      ->where('id_estudiante', $id)
      ->get()->toArray();

    return reset($resultado);
  }


}

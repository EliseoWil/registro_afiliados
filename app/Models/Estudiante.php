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
    return $this->select('id_estudiante','nombre_estu','ap_paterno_estu','ap_materno_estu','ru','curso','cod_asegurado','nombre_pais','nombre_universidad')
      ->join('universidad', 'universidad.id_universidad', '=', 'estudiante.id_universidad')
      ->join('pais', 'pais.id_pais', '=', 'estudiante.pais')
      ->get();

  }

  public function verEstudiantes($id){
    return $this->select('id_estudiante','nombre_estu','ap_paterno_estu','ap_materno_estu','ru','curso','cod_asegurado','nombre_pais','nombre_universidad','fecha_nacimiento','estado_civil','sexo_estu','direccion_estu','contactos_estu','nombre_departamento')
      ->join('universidad', 'universidad.id_universidad', '=', 'estudiante.id_universidad')
      ->join('pais', 'pais.id_pais', '=', 'estudiante.pais')
            ->join('departamento', 'departamento.id_departamento', '=', 'estudiante.departamento')
       ->where('estudiante.id_estudiante', '=', $id)
      ->get();

  }


}

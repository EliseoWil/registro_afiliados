<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MEmpleado extends Model
{
  protected $table = 'empleado';
  protected $primaryKey = "id_empleado";
  public $timestamps = false;
  use HasFactory;

  protected $fillable = [
    'ci_empleado',
    'complemento',
    'lugar_emision',
    'nombre_empleado',
    'ap_paterno',
    'ap_materno',
    'direccion',
    'fecha_nacimiento',
    'cargo',
    'profesion',
    'salario',
    'fecha_ingreso_laboral',
    'sexo',
    'estado_civil',
    'contactos_empleado',
    'id_empresa',
    'pais',
    'departamento',
    'provincia',
    'localidad',
    'cod_asegurado'
  ];

  public function listaEmpleados(){
    return $this->select('cod_asegurado','id_empleado','nombre_empleado','ap_paterno','ap_materno','fecha_ingreso_laboral','nombre_empresa','cargo')
      ->join('empresa', 'empresa.id_empresa', '=', 'empleado.id_empresa')
      ->get();

  }

  public function verEmpleado($id){
    $resultado= $this->select(
      'empleado.id_empleado',
      'empleado.ci_empleado',
      'empleado.complemento',
      'empleado.lugar_emision',
      'empleado.nombre_empleado',
      'empleado.ap_paterno',
      'empleado.ap_materno',
      'empleado.cod_asegurado',
      'pais.nombre_pais',
      'empleado.fecha_nacimiento',
      'empleado.estado_civil',
      'empleado.sexo',
      'empleado.direccion',
      'empleado.contactos_empleado',
      'departamento.nombre_departamento',
      'provincia.nombre_provincia',
      'localidad.nombre_localidad',
      'empresa.nombre_empresa',
      'empleado.cargo',
      'empleado.profesion',
      'empleado.salario',
      'empleado.fecha_ingreso_laboral',
      'carnet_seguro.cod_asegurado AS carnet_de_asegurado')

      ->leftJoin('pais', 'pais.id_pais', '=', 'empleado.pais')
      ->leftJoin('empresa', 'empresa.id_empresa', '=', 'empleado.id_empresa')
      ->leftJoin('departamento', 'departamento.id_departamento', '=' ,'empleado.departamento')
      ->leftJoin('localidad', 'localidad.id_localidad', '=', 'empleado.localidad')
      ->leftJoin('provincia', 'provincia.id_provincia', '=', 'empleado.provincia')
      ->leftJoin('carnet_seguro', 'carnet_seguro.cod_asegurado', '=', 'empleado.cod_asegurado')

      ->where('id_empleado', $id)
      ->get()
      ->toArray();

    if (!empty($resultado)) {
      return $resultado[0];
    }

    return null;
  }
}

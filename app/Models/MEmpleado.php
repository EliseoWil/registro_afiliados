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
   $resultado= $this->select('id_empleado', 'ci_empleado', 'complemento', 'lugar_emision','nombre_empleado','ap_paterno','ap_materno','cod_asegurado','nombre_pais','fecha_nacimiento','estado_civil','sexo','direccion','contactos_empleado','nombre_departamento','nombre_provincia','nombre_localidad', 'nombre_empresa', 'cargo', 'profesion', 'salario', 'fecha_ingreso_laboral')
      
      ->join('pais', 'pais.id_pais', '=', 'empleado.pais')
      ->join('empresa', 'empresa.id_empresa', '=', 'empleado.id_empresa')
      ->join('departamento', 'departamento.id_departamento', '=' ,'empleado.departamento')
      ->join('localidad', 'localidad.id_localidad', '=', 'empleado.localidad')
      ->join('provincia', 'provincia.id_provincia', '=', 'empleado.provincia')
      
      ->where('id_empleado', $id)
      ->get()->toArray();

    return reset($resultado);
  }
}

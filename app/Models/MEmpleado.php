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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';
    protected $primaryKey = "id_persona";
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'ci_persona',
        'complemento',
        'lugar_emision',
        'nombre_persona',
        'ap_paterno',
        'ap_materno',
        'direccion',
        'fecha_nacimiento',
        'factor',
        'grupo',
        'sexo',
        'estado_civil_pers',
        'contactos_persona',
        'datos_referencia',
        'pais',
        'departamento',
        'provincia',
        'localidad',
        'cod_asegurado'
    ];
  
  public function verPersona($id){
    
    $resultado = $this->select(
      'persona.id_persona', 
      'persona.ci_persona', 
      'persona.complemento', 
      'persona.lugar_emision', 
      'persona.nombre_persona', 
      'persona.ap_paterno', 
      'persona.ap_materno',
      'persona.direccion', 
      'persona.cod_asegurado', 
      'pais.nombre_pais',
      'persona.fecha_nacimiento',
      'persona.factor',
      'persona.grupo',
      'persona.estado_civil_pers', 
      'persona.sexo', 
      'persona.datos_referencia', 
      'persona.contactos_persona', 
      'pais.nombre_pais', 
      'departamento.nombre_departamento', 
      'provincia.nombre_provincia', 
      'localidad.nombre_localidad', 
      'carnet_seguro.cod_asegurado AS carnet_de_asegurado',
      'carnet_seguro.cod_asegurado_prov',
      'carnet_seguro.fotografia',
      'carnet_seguro.fecha_emision',
      'carnet_seguro.fecha_vencimiento'
      
    )
      ->leftJoin('pais', 'pais.id_pais', '=', 'persona.pais')
      ->leftJoin('departamento', 'departamento.id_departamento', '=', 'persona.departamento')
      ->leftJoin('localidad', 'localidad.id_localidad', '=', 'persona.localidad')
      ->leftJoin('provincia', 'provincia.id_provincia', '=', 'persona.provincia')
      ->leftJoin('carnet_seguro', 'carnet_seguro.cod_asegurado', '=', 'persona.cod_asegurado')
      ->where('persona.id_persona', $id)
      ->get()
      ->toArray();

    if (!empty($resultado)) {
      return $resultado[0];
    }

    return null;
  }
}

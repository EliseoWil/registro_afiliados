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
}

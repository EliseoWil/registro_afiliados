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
}

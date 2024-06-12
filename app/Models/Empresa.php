<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
  protected $table = "empresa";
  protected $primaryKey = "id_empresa";
  public $timestamps = false;
  use HasFactory;
  use HasFactory;

  protected $fillable = [
    'nro_patronal',
    'nombre_empresa',
    'direccion_empresa',
    'telefono_empresa',
    'email_empresa',
    'observacion',
    'estado_empresa'
  ];


}

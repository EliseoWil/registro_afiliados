<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;


class Carnet extends Model
{
  protected $table = "carnet_seguro";
  protected $primaryKey = "id_carnet_seguro";
  public $timestamps = false;
  use HasFactory;

  protected $fillable = [
    'fecha_emision',
    'fecha_vencimiento',
    'gestion',
    'fotografia',
    'cod_asegurado',
    'estado_carnet',
    'cod_asegurado_prov'
  ];

}

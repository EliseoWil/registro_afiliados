<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

/* use Illuminate\Foundation\Auth\User as Authenticatable; */
/*use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;*/

class User extends Model
{
  protected $table = "usuario";
  protected $primaryKey = "id_usuario";
  public $timestamps = false;
  use HasFactory;

  protected $fillable = [
    'nombre_usuario',
    'login_usuario',
    'password_usuario',
    'rol_usuario'
  ];

  public function getAuthIdentifierName()
  {
      return 'id_usuario'; // Reemplaza con el nombre de tu clave primaria
  }

  public function getAuthIdentifier()
  {
      return $this->{$this->getAuthIdentifierName()};
  }

  public function getAuthPassword()
  {
      return $this->password_usuario; // Reemplaza con el nombre de tu campo de contraseña
  }
}

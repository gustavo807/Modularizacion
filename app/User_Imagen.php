<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Imagen extends Model
{
  protected $table = 'user_imagenes';
  public $fillable = ['user_id','imagen_id','propietario'];
}

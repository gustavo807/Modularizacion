<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_Clave extends Model
{
  protected $table = 'user_claves';
  public $fillable = ['user_id','clave_id','valor','propietario'];

  public static function registro($user_id, $clave_id, $propietario){
    return DB::table('user_claves')
              //->select('doc_usuarios.*')
              ->where('user_id','=', $user_id)
              ->where('clave_id','=', $clave_id)
              ->where('propietario', '=', $propietario)
              ->first();
  }

}

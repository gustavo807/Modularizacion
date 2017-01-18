<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_Modulo extends Model
{
  protected $table = 'user_modulo';
  public $fillable = ['user_id','modulo_id','propietario'];

  public static function usermodulo($userid,$propietario,$idmodulo){
    return DB::table('user_modulo')
                    //->join('modulos', 'user_modulo.modulo_id', '=', 'modulos.id')
                    ->where('user_modulo.user_id','=', $userid)
                    ->where('user_modulo.propietario','=', $propietario)
                    ->where('user_modulo.modulo_id', '=', $idmodulo)
                    //->select('user_imagenes.*','imagenes.modulo_id')
                    ->first();
  }

  


}


/*
SELECT *
FROM user_modulo
WHERE user_modulo.user_id=1
and user_modulo.modulo_id=1
and user_modulo.propietario='empresa'
*/

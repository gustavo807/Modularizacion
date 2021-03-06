<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_Modulo extends Model
{
  protected $table = 'user_modulo';
  public $fillable = ['user_id','modulo_id','propietario'];

  // Obtiene la información de un registro user_modulo
  public static function usermodulo($userid,$propietario,$idmodulo)
  {
    return DB::table('user_modulo')
                    ->where('user_modulo.user_id', $userid)
                    ->where('user_modulo.propietario', $propietario)
                    ->where('user_modulo.modulo_id', $idmodulo)
                    ->first();
  }

  // Obtiene la información de un registro user_modulo
  public static function usermodulov2($userid,$propietario,$idmodulo)
  {
    return User_Modulo::where('user_modulo.user_id', $userid)
                      ->where('user_modulo.propietario', $propietario)
                      ->where('user_modulo.modulo_id', $idmodulo)
                      ->first();
  }

  // Obtiene una lista de user_modulo
  public static function modulos_editados($id)
  {
    return User_Modulo::where('user_id',$id)
                            ->where('propietario','generales')
                            ->pluck('modulo_id');
  }

  


}


/*
SELECT *
FROM user_modulo
WHERE user_modulo.user_id=1
and user_modulo.modulo_id=1
and user_modulo.propietario='empresa'
*/

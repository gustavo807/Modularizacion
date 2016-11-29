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

  public static function actualiza($user_id, $clave_id, $propietario,$valor){
    return DB::table('user_claves')
              //->select('doc_usuarios.*')
              ->where('user_id','=', $user_id)
              ->where('clave_id','=', $clave_id)
              ->where('propietario', '=', $propietario)
              ->update(['valor'=>$valor]);
  }

  public static function clavesusuario($user_id, $propietario){
    return DB::table('claves')
              ->select('claves.nombre','claves.identificador',
              DB::raw('(SELECT user_claves.valor
                        FROM user_claves
                         WHERE user_claves.clave_id=claves.id
                         and user_claves.user_id='.$user_id.'
                         and user_claves.propietario="'.$propietario.'") as valor')
                      )

              ->get();
  }



}
/*
SELECT claves.id,claves.nombre,claves.identificador,(
SELECT user_claves.valor
    FROM user_claves
    WHERE user_claves.clave_id=claves.id
    AND user_claves.propietario='empresa'
    and user_claves.user_id=1
) as valor
FROM claves
*/

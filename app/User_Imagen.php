<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_Imagen extends Model
{
  protected $table = 'user_imagenes';
  public $fillable = ['user_id','imagen_id','propietario'];

  public static function userimagen($userid,$propietario,$idmodulo){
    return DB::table('user_imagenes')
                    ->join('imagenes', 'user_imagenes.imagen_id', '=', 'imagenes.id')
                    ->where('user_imagenes.user_id','=', $userid)
                    ->where('user_imagenes.propietario','=', $propietario)
                    ->where('imagenes.modulo_id', '=', $idmodulo)
                    ->select('user_imagenes.*','imagenes.modulo_id')
                    ->first();
  }

  public static function actualizaimagen($userid,$propietario,$idmodulo,$imagen_id){
    return DB::table('user_imagenes')
                    ->join('imagenes', 'user_imagenes.imagen_id', '=', 'imagenes.id')
                    ->where('user_imagenes.user_id','=', $userid)
                    ->where('user_imagenes.propietario','=', $propietario)
                    ->where('imagenes.modulo_id', '=', $idmodulo)
                    //->select('user_parrafos.*','parrafos.modulo_id')
                    ->update(['user_imagenes.imagen_id'=>$imagen_id]);
  }

}



/*
SELECT user_imagenes.user_id, user_imagenes.imagen_id, user_imagenes.propietario
FROM user_imagenes
JOIN imagenes on user_imagenes.imagen_id=imagenes.id
WHERE user_imagenes.user_id=1
and user_imagenes.propietario='empresa'
and imagenes.modulo_id=1
*/

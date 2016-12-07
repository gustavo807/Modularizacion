<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_Parrafo extends Model
{
      protected $table = 'user_parrafos';
      public $fillable = ['user_id','parrafo_id','observacion','propietario'];

      public static function userparrafo($userid,$propietario,$idmodulo){
  			return DB::table('user_parrafos')
                        ->join('parrafos', 'user_parrafos.parrafo_id', '=', 'parrafos.id')
  											->where('user_parrafos.user_id','=', $userid)
                        ->where('user_parrafos.propietario','=', $propietario)
                        ->where('parrafos.modulo_id', '=', $idmodulo)
                        ->select('user_parrafos.*','parrafos.modulo_id')
  											->first();
  		}

      public static function actualizaparrafo($userid,$propietario,$idmodulo,$observacion,$parrafo_id){
  			return DB::table('user_parrafos')
                        ->join('parrafos', 'user_parrafos.parrafo_id', '=', 'parrafos.id')
  											->where('user_parrafos.user_id','=', $userid)
                        ->where('user_parrafos.propietario','=', $propietario)
                        ->where('parrafos.modulo_id', '=', $idmodulo)
                        //->select('user_parrafos.*','parrafos.modulo_id')
  											->update(['user_parrafos.observacion'=>$observacion,'parrafo_id'=>$parrafo_id]);
  		}

      public static function parrafosusuario($user_id, $propietario,$clasificacion_id){
        return DB::table('modulos')
                  ->select('modulos.modulo',
                  DB::raw(' (SELECT parrafos.parrafo
                        							FROM parrafos
                        							WHERE parrafos.modulo_id=modulos.id
                        							AND parrafos.id IN (SELECT user_parrafos.parrafo_id
                                                                          					FROM user_parrafos
                                                                          					WHERE user_parrafos.user_id='.$user_id.'
                                                                                   			AND user_parrafos.propietario="'.$propietario.'")  ) as parrafo  '),
                  DB::raw(' (SELECT imagenes.imagen
                        							FROM imagenes
                        							WHERE imagenes.modulo_id=modulos.id
                        							AND imagenes.id IN (SELECT user_imagenes.imagen_id
                                                                          					FROM user_imagenes
                                                                          					WHERE user_imagenes.user_id='.$user_id.'
                                                                                   			AND user_imagenes.propietario="'.$propietario.'")  ) as imagen  '),
                  DB::raw(' (SELECT ordena_modulos.orden
                                              FROM ordena_modulos WHERE ordena_modulos.modulo_id=modulos.id) as orden  ')
                          )
                  ->where('modulos.clasificacion_id','=', $clasificacion_id)
                  ->orderBy('orden', 'asc')
                  ->paginate(10);
      }

}

/*
SELECT modulos.modulo, (SELECT parrafos.parrafo
                        							FROM parrafos
                        							WHERE parrafos.modulo_id=modulos.id
                        							AND parrafos.id IN (SELECT user_parrafos.parrafo_id
                                                                          					FROM user_parrafos
                                                                          					WHERE user_parrafos.user_id=1
                                                                                   			AND user_parrafos.propietario='empresa')  ) as parrafo,
                                             (SELECT imagenes.imagen
                        							FROM imagenes
                        							WHERE imagenes.modulo_id=modulos.id
                        							AND imagenes.id IN (SELECT user_imagenes.imagen_id
                                                                          					FROM user_imagenes
                                                                          					WHERE user_imagenes.user_id=1
                                                                                   			AND user_imagenes.propietario='empresa')  ) as imagen,
                                             (SELECT ordena_modulos.orden
                                              FROM ordena_modulos WHERE ordena_modulos.modulo_id=modulos.id) as orden
FROM modulos
WHERE modulos.clasificacion_id=1
ORDER BY orden
*/

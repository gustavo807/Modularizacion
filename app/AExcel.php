<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AExcel extends Model
{
	    public static function claves($user_id, $propietario){
		    return DB::table('claves')
		              ->select('claves.nombre','claves.identificador',
		              DB::raw('(SELECT user_claves.valor
		                        FROM user_claves
		                         WHERE user_claves.clave_id=claves.id
		                         and user_claves.user_id='.$user_id.'
		                         and user_claves.propietario="'.$propietario.'") as valor')
		                      )
		              ->whereIn('claves.modulo_id', function($query){
		                    $query->select('modulos.id')
		                    ->from('modulos')
		                    ->where('modulos.clasificacion_id','=','1');
		                })
		              ->get();
	  }

	  public static function clavesproyecto($idproyecto, $propietario){
      return DB::table('claves')
                ->select('claves.nombre','claves.identificador',
                DB::raw('(SELECT proyectos_claves.valor
                          FROM proyectos_claves
                           WHERE proyectos_claves.clave_id=claves.id
                           and proyectos_claves.proyecto_id='.$idproyecto.'
                           and proyectos_claves.propietario="'.$propietario.'") as valor')
                        )
                ->whereIn('claves.modulo_id', function($query){
                      $query->select('modulos.id')
                      ->from('modulos')
                      ->where('modulos.clasificacion_id','=','2');
                  })
                ->get();
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
                  DB::raw(' (SELECT user_parrafos.observacion
                                                       FROM user_parrafos
                                                       WHERE user_parrafos.user_id='.$user_id.'
                                                       AND user_parrafos.propietario="'.$propietario.'"
                                              		   AND user_parrafos.parrafo_id IN (SELECT parrafos.id
                                                                                                                    FROM parrafos
                                                                                                                    WHERE parrafos.modulo_id=modulos.id)  ) as comentario  '),
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
                  ->get();
      }

      public static function parrafosproyecto($idproyecto, $propietario,$clasificacion_id){
      return DB::table('modulos')
                ->select('modulos.modulo',
                DB::raw(' (SELECT parrafos.parrafo
                                    FROM parrafos
                                    WHERE parrafos.modulo_id=modulos.id
                                    AND parrafos.id IN (SELECT proyectos_parrafos.parrafo_id
                                                                                  FROM proyectos_parrafos
                                                                                  WHERE proyectos_parrafos.proyecto_id='.$idproyecto.'
                                                                                      AND proyectos_parrafos.propietario="'.$propietario.'")  ) as parrafo  '),
                DB::raw(' (SELECT proyectos_parrafos.observacion
                                                       FROM proyectos_parrafos
                                                       WHERE proyectos_parrafos.proyecto_id='.$idproyecto.'
                                                       AND proyectos_parrafos.propietario="'.$propietario.'"
                                              		   AND proyectos_parrafos.parrafo_id IN (SELECT parrafos.id
	                                                                                                    FROM parrafos
	                                                                                                    WHERE parrafos.modulo_id=modulos.id)  ) as comentario  '),
                DB::raw(' (SELECT imagenes.imagen
                                    FROM imagenes
                                    WHERE imagenes.modulo_id=modulos.id
                                    AND imagenes.id IN (SELECT proyectos_imagenes.imagen_id
                                                                                  FROM proyectos_imagenes
                                                                                  WHERE proyectos_imagenes.proyecto_id='.$idproyecto.'
                                                                                      AND proyectos_imagenes.propietario="'.$propietario.'")  ) as imagen  '),
                DB::raw(' (SELECT ordena_modulos.orden
                                            FROM ordena_modulos WHERE ordena_modulos.modulo_id=modulos.id) as orden  ')
                        )
                ->where('modulos.clasificacion_id','=', $clasificacion_id)
                ->orderBy('orden', 'asc')
                ->get();
    }



}

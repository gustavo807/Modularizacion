<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proyecto_Parrafo extends Model
{
    protected $table = 'proyectos_parrafos';
    public $fillable = ['proyecto_id','parrafo_id','observacion','propietario'];

    // Obtiene la informaciónd e proyectos_parrafos
		public static function proyectoparrafo($idproyecto,$propietario,$idmodulo)
    {
			return DB::table('proyectos_parrafos')
											->join('parrafos', 'proyectos_parrafos.parrafo_id', '=', 'parrafos.id')
											->where('proyectos_parrafos.proyecto_id','=', $idproyecto)
											->where('proyectos_parrafos.propietario','=', $propietario)
											->where('parrafos.modulo_id', '=', $idmodulo)
											->select('proyectos_parrafos.*','parrafos.modulo_id')
											->first();
		}

    // Actualiza la información de un proyecto_parrafo
		public static function actualizaparrafo($idproyecto,$propietario,$idmodulo,$observacion,$parrafo_id)
    {
			return DB::table('proyectos_parrafos')
											->join('parrafos', 'proyectos_parrafos.parrafo_id', '=', 'parrafos.id')
											->where('proyectos_parrafos.proyecto_id','=', $idproyecto)
											->where('proyectos_parrafos.propietario','=', $propietario)
											->where('parrafos.modulo_id', '=', $idmodulo)
											//->select('user_parrafos.*','parrafos.modulo_id')
											->update(['proyectos_parrafos.observacion'=>$observacion,'proyectos_parrafos.parrafo_id'=>$parrafo_id]);
		}

    // Obtiene la información de modulos por proyecto, propietario y clasificacion
    public static function parrafosproyecto($idproyecto, $propietario,$clasificacion_id)
    {
      return DB::table('modulos')
                ->select('modulos.modulo',
                DB::raw(' (SELECT parrafos.parrafo
                                    FROM parrafos
                                    WHERE parrafos.modulo_id=modulos.id
                                    AND parrafos.id IN (SELECT proyectos_parrafos.parrafo_id
                                                                                  FROM proyectos_parrafos
                                                                                  WHERE proyectos_parrafos.proyecto_id='.$idproyecto.'
                                                                                      AND proyectos_parrafos.propietario="'.$propietario.'")  ) as parrafo  '),
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
                ->paginate(10);
    }


}

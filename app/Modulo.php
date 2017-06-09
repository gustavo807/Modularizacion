<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Datatables;

class Modulo extends Model
{

    protected $table = 'modulos';
    public $fillable = ['modulo','descripcion','clasificacion_id'];

    // Obtiene las clasificaciones
		public static function clasificaciones()
    {
			return DB::table('modulos')
											->join('clasificaciones', 'modulos.clasificacion_id', '=', 'clasificaciones.id')
											->select('modulos.*', 'clasificaciones.clasificacion')
                      ->orderBy('clasificaciones.clasificacion', 'asc')
                      ->orderBy('modulos.modulo', 'asc')
											->paginate(10);
		}

    //Obtiene los modulos por ususario y propietario
		public static function modulosgnrl($iduser,$propietario)
    {
			return DB::table('modulos')
                      ->select('modulos.*',
                      DB::raw('(SELECT user_modulo.modulo_id
                                FROM user_modulo
                                 WHERE user_modulo.modulo_id=modulos.id
                                 and user_modulo.user_id='.$iduser.'
                                 and user_modulo.propietario="'.$propietario.'") as completo'),
                       DB::raw('(SELECT ordena_modulos.orden
                                 FROM ordena_modulos
                                  WHERE ordena_modulos.modulo_id=modulos.id) as orden')
                                )
											->where('modulos.clasificacion_id','=','1')
                      ->orderBy('orden', 'asc')
											->paginate(10);
		}

    // Obtiene los modulos por convocatoria
    public static function modulosconvocatoria($iduser,$propietario)
    {
			return DB::table('modulos')
                      ->select('modulos.*',
                      DB::raw('(SELECT user_modulo.modulo_id
                                FROM user_modulo
                                 WHERE user_modulo.modulo_id=modulos.id
                                 and user_modulo.user_id='.$iduser.'
                                 and user_modulo.propietario="'.$propietario.'") as completo')
                              )
											->where('modulos.clasificacion_id','=','2')
											->get();
		}

    // Obtiene los modulos por proyecto
    public static function proyectosmodulo($idproyecto,$propietario)
    {
			return DB::table('modulos')
                      ->select('modulos.*',
                      DB::raw('(SELECT proyecto_modulo.modulo_id
                                FROM proyecto_modulo
                                 WHERE proyecto_modulo.modulo_id=modulos.id
                                 and proyecto_modulo.proyecto_id='.$idproyecto.'
                                 and proyecto_modulo.propietario="'.$propietario.'") as completo'),
                       DB::raw('(SELECT ordena_modulos.orden
                                 FROM ordena_modulos
                                  WHERE ordena_modulos.modulo_id=modulos.id) as orden')
                              )
											->where('modulos.clasificacion_id','=','2')
                      ->orderBy('orden', 'asc')
											->paginate(10);
		}

    // Obtiene los modulos para mostralos con la libreria DataTable
    public static function apimodulos()
    {
      return Datatables::queryBuilder(
            DB::table('modulos')
                      //->join('clasificaciones', 'modulos.clasificacion_id', '=', 'clasificaciones.id')
                      ->select('modulos.*', 
                          DB::raw('(SELECT clasificaciones.clasificacion
                                 FROM clasificaciones
                                  WHERE clasificaciones.id=modulos.clasificacion_id) as clasificacion')
                        )
            )->make(true);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Modulo extends Model
{
	//use SoftDeletes;

    protected $table = 'modulos';
    public $fillable = ['modulo','descripcion','clasificacion_id'];

    //protected $dates = ['deleted_at'];

		public static function clasificaciones(){
			return DB::table('modulos')
											->join('clasificaciones', 'modulos.clasificacion_id', '=', 'clasificaciones.id')
											->select('modulos.*', 'clasificaciones.clasificacion')
                      ->orderBy('clasificaciones.clasificacion', 'asc')
                      ->orderBy('modulos.modulo', 'asc')
											->paginate(10);
		}

		public static function modulosgnrl($iduser,$propietario){
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

    public static function modulosconvocatoria($iduser,$propietario){
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

    public static function proyectosmodulo($idproyecto,$propietario){
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


}

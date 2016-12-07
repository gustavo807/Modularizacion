<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto_Clave extends Model
{
	//use SoftDeletes;

    protected $table = 'proyectos_claves';
    public $fillable = ['valor','proyecto_id','clave_id','propietario'];

    //protected $dates = ['deleted_at'];

		public static function registro($idproyecto, $clave_id, $propietario){
	    return DB::table('proyectos_claves')
	              //->select('doc_usuarios.*')
	              ->where('proyecto_id','=', $idproyecto)
	              ->where('clave_id','=', $clave_id)
	              ->where('propietario', '=', $propietario)
	              ->first();
	  }

		public static function actualiza($idproyecto, $clave_id, $propietario,$valor){
	    return DB::table('proyectos_claves')
	              //->select('doc_usuarios.*')
	              ->where('proyecto_id','=', $idproyecto)
	              ->where('clave_id','=', $clave_id)
	              ->where('propietario', '=', $propietario)
	              ->update(['valor'=>$valor]);
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

                ->paginate(10);
    }

    public static function clavepro($idproyecto, $propietario){
      return DB::table('claves')
                ->select('claves.nombre','claves.identificador',
                DB::raw('(SELECT proyectos_claves.valor
                          FROM proyectos_claves
                           WHERE proyectos_claves.clave_id=claves.id
                           and proyectos_claves.proyecto_id='.$idproyecto.'
                           and proyectos_claves.propietario="'.$propietario.'") as valor')
                        )
                ->where('clave_id','=', $clave_id)
                ->get();
    }

    public static function claves($idproyecto, $propietario){
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
                ->paginate(10);
    }


}

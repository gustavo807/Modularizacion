<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proyecto_Clave extends Model
{
    protected $table = 'proyectos_claves';
    public $fillable = ['valor','proyecto_id','clave_id','propietario'];

    // Obtiene un registro en especifico
		public static function registro($idproyecto, $clave_id, $propietario)
    {
	    return DB::table('proyectos_claves')
	              //->select('doc_usuarios.*')
	              ->where('proyecto_id','=', $idproyecto)
	              ->where('clave_id','=', $clave_id)
	              ->where('propietario', '=', $propietario)
	              ->first();
	  }

    // Actualiza al informacion  proyectos_claves
		public static function actualiza($idproyecto, $clave_id, $propietario,$valor)
    {
	    return DB::table('proyectos_claves')
	              //->select('doc_usuarios.*')
	              ->where('proyecto_id','=', $idproyecto)
	              ->where('clave_id','=', $clave_id)
	              ->where('propietario', '=', $propietario)
	              ->update(['valor'=>$valor]);
	  }

    // Obtiene las claves de proyecto
    public static function clavesproyecto($idproyecto, $propietario)
    {
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

    // Obtiene las claves de un proyecto en especifico
    public static function clavepro($idproyecto, $propietario)
    {
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

    // Obtiene el nombre de la clave y su valor y propietario
    public static function claves($idproyecto, $propietario)
    {
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

    // Obtiene las claves de un proyecto en especifico
    public static function getclavesuser($idproyecto, $propietario)
    {
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
}

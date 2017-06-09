<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Datatables;

class User_Clave extends Model
{
  protected $table = 'user_claves';
  public $fillable = ['user_id','clave_id','valor','propietario'];

  // Obtiene la información de un registro de user_clave 
  public static function registro($user_id, $clave_id, $propietario)
  {
    return DB::table('user_claves')
              //->select('doc_usuarios.*')
              ->where('user_id','=', $user_id)
              ->where('clave_id','=', $clave_id)
              ->where('propietario', '=', $propietario)
              ->first();
  }

  // Actualiza la información de un registro user_clave
  public static function actualiza($user_id, $clave_id, $propietario,$valor)
  {
    return DB::table('user_claves')
              //->select('doc_usuarios.*')
              ->where('user_id','=', $user_id)
              ->where('clave_id','=', $clave_id)
              ->where('propietario', '=', $propietario)
              ->update(['valor'=>$valor]);
  }

  // Obtiene la información en paginación de claves
  public static function clavesusuario($user_id, $propietario)
  {
    return DB::table('claves')
              ->select('claves.nombre','claves.identificador',
              DB::raw('(SELECT user_claves.valor
                        FROM user_claves
                         WHERE user_claves.clave_id=claves.id
                         and user_claves.user_id='.$user_id.'
                         and user_claves.propietario="'.$propietario.'") as valor')
                      )

              ->paginate(10);
  }

  // Obtiene la información de las claves
  public static function getclavesusuario($user_id, $propietario)
  {
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

  // Obtiene la información en paginación de claves
  public static function claves($user_id, $propietario)
  {
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
              ->paginate(10);
  }

  // Obtiene la información de las claves por usuario
  public static function getclaves($user_id, $propietario)
  {
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

  //Obtiene la información de las claves para mostrarla con la libreria DataTable
  public static function apiclaves($id, $user,$tipo)
  {
    if($tipo == "1")
      return Datatables::queryBuilder(
              DB::table('claves')
                ->select('claves.nombre','claves.identificador','claves.created_at',
                DB::raw('(SELECT user_claves.valor
                          FROM user_claves
                           WHERE user_claves.clave_id=claves.id
                           and user_claves.user_id='.$id.'
                           and user_claves.propietario="'.$user.'") as valor')
                        )
                ->whereIn('claves.modulo_id', function($query) {
                      $query->select('modulos.id')
                      ->from('modulos')
                      ->where('modulos.clasificacion_id',"1");
                  })
              )->make(true);
    elseif($tipo == "2")
      return Datatables::queryBuilder(
              DB::table('claves')
                ->select('claves.nombre','claves.identificador','claves.created_at',
                DB::raw('(SELECT proyectos_claves.valor
                          FROM proyectos_claves
                           WHERE proyectos_claves.clave_id=claves.id
                           and proyectos_claves.proyecto_id='.$id.'
                           and proyectos_claves.propietario="'.$user.'") as valor')
                        )  
                ->whereIn('claves.modulo_id', function($query) {
                      $query->select('modulos.id')
                      ->from('modulos') 
                      ->where('modulos.clasificacion_id',"2");
                  })              
              )->make(true);
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

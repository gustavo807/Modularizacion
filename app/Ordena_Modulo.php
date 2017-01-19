<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ordena_Modulo extends Model
{
  protected $table = 'ordena_modulos';
  public $fillable = ['modulo_id','orden'];

  public static function ordenmodulos($clasificacion_id){
    return DB::table('modulos')
                    ->select('modulos.*',
                    DB::raw('(SELECT ordena_modulos.orden
                                FROM ordena_modulos
                                WHERE ordena_modulos.modulo_id=modulos.id) as orden')
                            )
                    ->where('modulos.clasificacion_id', '=', $clasificacion_id)
                    ->orderBy('orden', 'asc')
                    ->paginate(10);
  }

  public static function actualiza($modulo_id,$orden){
    return DB::table('ordena_modulos')
                    ->where('ordena_modulos.modulo_id', '=', $modulo_id)
                    ->update(['orden'=>$orden]);
  }

  public static function gnrlconv($modulo_id){
    return DB::table('modulos')
                    ->select('modulos.clasificacion_id')
                    ->where('modulos.id', '=', $modulo_id)
                    ->first();
  }

  public static function validamodulo($orden, $tipo='1'){
    return DB::table('ordena_modulos')
                    ->whereIn('ordena_modulos.modulo_id', function($query) use($tipo) {
                          $query->select('modulos.id')
                          ->from('modulos')
                          ->where('modulos.clasificacion_id','=',$tipo);
                      })
                    ->where('ordena_modulos.orden', '<', $orden)
                    ->orderBy('ordena_modulos.orden', 'desc')
                    ->limit(1)
                    ->get();
  }

  public static function primermodulo($tipo='1'){
    return DB::table('ordena_modulos')
                    ->whereIn('ordena_modulos.modulo_id', function($query) use($tipo){
                          $query->select('modulos.id')
                          ->from('modulos')
                          ->where('modulos.clasificacion_id','=',$tipo);
                      })
                    ->orderBy('ordena_modulos.orden', 'asc')
                    ->limit(1)
                    ->get();
  }

  public static function siguientemodulo($orden){
    return DB::table('ordena_modulos')
                    ->whereIn('ordena_modulos.modulo_id', function($query){
                          $query->select('modulos.id')
                          ->from('modulos')
                          ->where('modulos.clasificacion_id','=','1');
                      })
                    ->where('ordena_modulos.orden', '<', $orden)
                    ->orderBy('ordena_modulos.orden', 'desc')
                    ->limit(1)
                    ->get();
  }


  public static function ultimomodulo($tipo='1'){
    return DB::table('ordena_modulos')
                    ->select('ordena_modulos.modulo_id')
                    ->whereIn('ordena_modulos.modulo_id', function($query) use($tipo) {
                          $query->select('modulos.id')
                          ->from('modulos')
                          ->where('modulos.clasificacion_id','=',$tipo);
                      })
                    //->where('ordena_modulos.orden', '<', $orden)
                    ->orderBy('ordena_modulos.orden', 'desc')
                    ->limit(1)
                    ->get();
  }


  public static function orden($clasificacion_id){
    return DB::table('modulos')
                    ->select('modulos.*',
                    DB::raw('(SELECT ordena_modulos.orden
                                FROM ordena_modulos
                                WHERE ordena_modulos.modulo_id=modulos.id) as orden')
                            )
                    ->where('modulos.clasificacion_id', '=', $clasificacion_id)
                    ->orderBy('orden', 'asc')
                    ->get();
  }

  public static function getposition($array,$id)
  {
    $position = "";
    for ($i=1; $i <= count($array) ; $i++) 
    { 
      if($array[$i-1] == $id)
        $position = $i;  
    }

    return $position;
  }


}




/*
SELECT modulos.modulo, (
    		SELECT ordena_modulos.orden
    			FROM ordena_modulos
    			WHERE ordena_modulos.modulo_id=modulos.id ) as orden
FROM modulos
WHERE modulos.clasificacion_id=1
ORDER BY `orden`  ASC

SELECT *
FROM `ordena_modulos`
WHERE ordena_modulos.modulo_id IN (SELECT modulos.id FROM modulos WHERE modulos.clasificacion_id=1)
AND ordena_modulos.orden < 'z.1'
ORDER BY `ordena_modulos`.`orden` DESC
LIMIT 1
*/


/*
--EN PROCESO PARA HACER QUE SE DESHABILITEN LOS CAMPOS
SELECT *,(
            SELECT user_modulo.modulo_id
            FROM user_modulo
            WHERE user_modulo.user_id=10
            AND user_modulo.propietario='empresa'
            AND user_modulo.modulo_id IN (SELECT modulos.id FROM modulos WHERE modulos.clasificacion_id=1)
    		AND user_modulo.modulo_id=ordena_modulos.modulo_id
) as completo
FROM `ordena_modulos`
WHERE ordena_modulos.modulo_id IN (SELECT modulos.id FROM modulos WHERE modulos.clasificacion_id=1)
ORDER BY `ordena_modulos`.`orden` ASC


SELECT *, (SELECT ordena_modulos.orden FROM ordena_modulos WHERE ordena_modulos.modulo_id=user_modulo.modulo_id) as orden
FROM user_modulo
WHERE user_modulo.user_id=10
AND user_modulo.propietario='empresa'
AND user_modulo.modulo_id IN (SELECT modulos.id FROM modulos WHERE modulos.clasificacion_id=1)
ORDER BY orden DESC
*/

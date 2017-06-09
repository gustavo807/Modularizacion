<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evaluacion extends Model
{
    protected $table = 'evaluacion';
    public $fillable = ['pregunta','variable','tipo'];

    // Obtiene los datos de la evaluacion de un usario en especifico
    public static function getdatos($id_user,$tipo)
    {
    return DB::table('evaluacion')
                    ->select('evaluacion.*',

                    DB::raw('(SELECT euser.valor
                                FROM euser
                                WHERE euser.tipo="'.$tipo.'"
                                AND euser.user_id="'.$id_user.'"
                                AND euser.evaluacion_id=evaluacion.id) as valor')
                            )
                    ->where('evaluacion.tipo', '=', $tipo)
                    //->orderBy('orden', 'asc')
                    ->get();
  }

  // Obtiene las repuestas de la evaluacion por proyecto
  public static function getrespuestas($id_proyecto,$tipo)
  {
    return DB::table('evaluacion')
                    ->select('evaluacion.*',
                    DB::raw('"opcion" as opcion'), 
                    DB::raw('(SELECT evariables.id 
                                FROM evproyectos
                                JOIN evariables ON (evproyectos.evariable_id=evariables.id)
                                WHERE evproyectos.proyecto_id="'.$id_proyecto.'"
                                AND evproyectos.evaluacion_id=evaluacion.id) as valor')
                            )
                    ->where('evaluacion.tipo', $tipo)
                    ->get();
  }

}



/*
SELECT evaluacion.pregunta,evaluacion.variable,(SELECT euser.valor FROM euser WHERE  euser.tipo='competitividad' and euser.user_id=2 AND euser.evaluacion_id=evaluacion.id)
FROM evaluacion


SELECT evaluacion.pregunta,evaluacion.variable,
(SELECT evariables.opcion 
 FROM evproyectos 
 JOIN evariables ON (evproyectos.evariable_id=evariables.id)
 WHERE evproyectos.proyecto_id=1 
 AND evproyectos.evaluacion_id=evaluacion.id) as valor
FROM evaluacion
WHERE evaluacion.tipo='tecnico'
*/
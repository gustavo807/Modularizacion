<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evproyecto extends Model
{
    protected $table = 'evproyectos';
    public $fillable = ['proyecto_id','evaluacion_id','evariable_id'];

    public static function getresultados($id_proyecto,$variable){
    return DB::table('evproyectos')                    
                    ->where('evproyectos.proyecto_id', $id_proyecto)
                    ->avg(DB::raw('(SELECT evariables.porcentaje 
                                FROM evariables
                                WHERE evariables.variable="'.$variable.'"
                                AND evproyectos.evariable_id=evariables.id)'));
  }

  public static function calcula($dato){
        if($dato < 25)
          return 'BAJO';
        elseif($dato < 50)
          return 'MEDIO';
        elseif($dato < 75)
          return 'ALTO';
        else
          return 'MUY ALTO';
    }

  public static function status_evaluacion($proyecto_id)
    {
        $preguntas = DB::table('evaluacion')
                      ->where('evaluacion.tipo', "tecnico")
                      ->count();

        $repuestas = DB::table('evproyectos')
                      ->where('evproyectos.proyecto_id', $proyecto_id)
                      ->count();

        if($preguntas == $repuestas)
          return "true";
        else
          return "false";
    }

}


/*
SELECT AVG((SELECT evariables.porcentaje FROM evariables WHERE evariables.variable='RIESGO TÉCNICO' AND evproyectos.evariable_id=evariables.id))
FROM evproyectos
WHERE evproyectos.proyecto_id=1
*/
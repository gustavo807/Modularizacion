<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Euser extends Model
{
    protected $table = 'euser';
    public $fillable = ['tipo','valor','user_id','evaluacion_id'];

    // Obtiene los resuldos de la evaluacion de competitividad o variable
    public static function resultados($id_user,$tipo,$variable)
    {
      return DB::table('euser')
                    ->select('euser.valor')
                    ->where('euser.tipo', $tipo)
                    ->where('euser.user_id', $id_user)
                    ->whereIn('euser.evaluacion_id', function($query) use ($variable){
	                      $query->select('evaluacion.id')
	                      ->from('evaluacion')
	                      ->where('evaluacion.variable', $variable);
	                  })
                    ->sum('euser.valor');
    }

    // Calcula el estado segun el parametro
  public static function calcula($dato)
  {
        if($dato < 2.9)
          return 'MUY BAJO';
        elseif($dato < 4.9)
          return 'REGULAR';
        elseif($dato < 7.9)
          return 'BUENO';
        else
          return 'ALTO';
    }

    // Determina si constetaron todas las preguntas
    public static function status_evaluacion($user_id)
    {
        $preguntas = DB::table('evaluacion')
                      ->where('evaluacion.tipo', "competitividad")
                      ->count();

        $repuestas = DB::table('euser')
                      ->where('euser.user_id', $user_id)
                      ->count();

        if($preguntas == $repuestas)
          return "true";
        else
          return "false";
    }

}


/*
SELECT SUM(euser.valor) 
FROM euser 
WHERE  euser.tipo='competitividad' and euser.user_id=2 
AND euser.evaluacion_id IN (SELECT evaluacion.id FROM evaluacion WHERE evaluacion.variable='Mercado y Ventas')
*/
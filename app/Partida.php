<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Datatables;

class Partida extends Model
{
    public $fillable = ['descripcion','precio','cambio','sede_id'];

    // Eloquent relación de uno a uno
    public function sede()
    {
      return $this->belongsTo('App\Sede');
    }

    // Eloquent realición a muchos
    public function proyectos()
    {
        return $this->belongsToMany('App\Proyecto');
    }

    // Obtiene las partidas con plugin del DataTable
    public static function api()
    {
      return Datatables::queryBuilder(
      		DB::table('partidas')
      				->join('sedes', 'sedes.id', '=', 'partidas.sede_id')
            		->join('users', 'users.id', '=', 'sedes.user_id')
       				->select('partidas.*','users.nombre as sede')				         
       )->make(true);
    }

    // Compara un valor y devuelve true o false
    public static function findcambio($valor)
    {
        $array = ['pesos','dólares'];
        if(! in_array($valor, $array)) abort(403);
    }

    // Busca una sede una partida
    public static function valida($cambio,$sede_id)
    {
        Partida::findcambio($cambio);
        Sede::findsede($sede_id);
    }

    // Obtiene las partidas de un proyecto en especifico
    public static function proyecto_partidas($proyecto_id,$tipo='paginate')
    {
        $valor = '10';
        if($tipo != 'paginate')
        {
            $tipo='get';
            $valor='';
        }

        return DB::table('partidas')
                        ->join('partida_proyecto', 'partidas.id', '=', 'partida_proyecto.partida_id')
                        ->join('sedes','sedes.id','=','partidas.sede_id')
                        ->join('users', 'sedes.user_id', '=', 'users.id')
                        ->where('partida_proyecto.proyecto_id', $proyecto_id)
                        ->select('partidas.*','users.nombre','users.estado','users.ciudad')
                        ->$tipo($valor);
    }

}

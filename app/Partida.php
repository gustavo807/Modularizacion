<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Datatables;

class Partida extends Model
{
    public $fillable = ['descripcion','precio','cambio','sede_id'];

    public function sede()
    {
      return $this->belongsTo('App\Sede');
    }

    public function proyectos()
    {
        return $this->belongsToMany('App\Proyecto');
    }

    public static function api()
    {
      return Datatables::queryBuilder(
      		DB::table('partidas')
      				->join('sedes', 'sedes.id', '=', 'partidas.sede_id')
            		->join('users', 'users.id', '=', 'sedes.user_id')
       				->select('partidas.*','users.nombre as sede')				         
       )->make(true);
    }

    public static function findcambio($valor)
    {
        $array = ['pesos','dólares'];
        if(! in_array($valor, $array)) abort(403);
    }

    public static function valida($cambio,$sede_id)
    {
        Partida::findcambio($cambio);
        Sede::findsede($sede_id);
    }

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

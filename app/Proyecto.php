<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto extends Model
{
	//use SoftDeletes;

    protected $table = 'proyectos';
    public $fillable = ['nombre','descripcion','convocatoria_id','user_id'];

    //protected $dates = ['deleted_at'];

    public static function proyectoconvocatoria($user_id){
      return DB::table('proyectos')
                ->select('proyectos.*',
                DB::raw('(SELECT convocatorias.convocatoria
                          FROM convocatorias
                           WHERE convocatorias.id=proyectos.convocatoria_id) as convocatoria')
                        )
                ->where('proyectos.user_id', '=',$user_id)
                ->get();
    }

}

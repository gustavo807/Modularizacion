<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Modulo extends Model
{
	//use SoftDeletes;

    protected $table = 'modulos';
    public $fillable = ['modulo','clasificacion_id'];

    //protected $dates = ['deleted_at'];

		public static function clasificaciones(){
			return DB::table('modulos')
											->join('clasificaciones', 'modulos.clasificacion_id', '=', 'clasificaciones.id')
											->select('modulos.*', 'clasificaciones.clasificacion')
											->get();
		}

		public static function modulosgnrl(){
			return DB::table('modulos')
											->where('modulos.clasificacion_id','=','1')
											->get();
		}

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Parrafo extends Model
{
	//use SoftDeletes;

    protected $table = 'parrafos';
    public $fillable = ['parrafo','modulo_id'];

    //protected $dates = ['deleted_at'];

		public static function modulos(){
			return DB::table('parrafos')
											->join('modulos', 'modulos.id', '=', 'parrafos.modulo_id')
											->select('parrafos.*', 'modulos.modulo')
											->get();
		}

    public static function parrafosmodulos($idmodulo){
			return DB::table('parrafos')
											//->join('modulos', 'modulos.id', '=', 'parrafos.modulo_id')
											->where('parrafos.modulo_id','=', $idmodulo)
											->get();
		}

}

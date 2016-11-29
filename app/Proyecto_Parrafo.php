<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto_Parrafo extends Model
{
	//use SoftDeletes;

    protected $table = 'proyectos_parrafos';
    public $fillable = ['proyecto_id','parrafo_id','observacion','propietario'];

    //protected $dates = ['deleted_at'];

		public static function proyectoparrafo($idproyecto,$propietario,$idmodulo){
			return DB::table('proyectos_parrafos')
											->join('parrafos', 'proyectos_parrafos.parrafo_id', '=', 'parrafos.id')
											->where('proyectos_parrafos.proyecto_id','=', $idproyecto)
											->where('proyectos_parrafos.propietario','=', $propietario)
											->where('parrafos.modulo_id', '=', $idmodulo)
											->select('proyectos_parrafos.*','parrafos.modulo_id')
											->first();
		}

		public static function actualizaparrafo($idproyecto,$propietario,$idmodulo,$observacion,$parrafo_id){
			return DB::table('proyectos_parrafos')
											->join('parrafos', 'proyectos_parrafos.parrafo_id', '=', 'parrafos.id')
											->where('proyectos_parrafos.proyecto_id','=', $idproyecto)
											->where('proyectos_parrafos.propietario','=', $propietario)
											->where('parrafos.modulo_id', '=', $idmodulo)
											//->select('user_parrafos.*','parrafos.modulo_id')
											->update(['proyectos_parrafos.observacion'=>$observacion,'proyectos_parrafos.parrafo_id'=>$parrafo_id]);
		}

}

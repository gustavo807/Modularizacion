<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_Parrafo extends Model
{
      protected $table = 'user_parrafos';
      public $fillable = ['user_id','parrafo_id','observacion','propietario'];

      public static function userparrafo($userid,$propietario,$idmodulo){
  			return DB::table('user_parrafos')
                        ->join('parrafos', 'user_parrafos.parrafo_id', '=', 'parrafos.id')
  											->where('user_parrafos.user_id','=', $userid)
                        ->where('user_parrafos.propietario','=', $propietario)
                        ->where('parrafos.modulo_id', '=', $idmodulo)
                        ->select('user_parrafos.*','parrafos.modulo_id')
  											->first();
  		}

      public static function actualizaparrafo($userid,$propietario,$idmodulo,$observacion,$parrafo_id){
  			return DB::table('user_parrafos')
                        ->join('parrafos', 'user_parrafos.parrafo_id', '=', 'parrafos.id')
  											->where('user_parrafos.user_id','=', $userid)
                        ->where('user_parrafos.propietario','=', $propietario)
                        ->where('parrafos.modulo_id', '=', $idmodulo)
                        //->select('user_parrafos.*','parrafos.modulo_id')
  											->update(['user_parrafos.observacion'=>$observacion,'parrafo_id'=>$parrafo_id]);
  		}

}

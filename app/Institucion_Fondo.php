<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Institucion_Fondo extends Model
{
  protected $table = 'fondo_institucion';
  public $fillable = ['institucion_id','fondo_id'];

//UPDATE THIS
  public static function actualizar($oldInstitucion_id, $fondo_id, $newInstitucion_id){
    return DB::table('fondo_institucion')
              //->select('doc_usuarios.*')
              ->where('fondo_id','=', $fondo_id)
              ->where('institucion_id','=', $oldInstitucion_id)
              ->update(['institucion_id'=>$newInstitucion_id]);
  }

}

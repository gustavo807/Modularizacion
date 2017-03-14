<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proyecto_Modulo extends Model
{
  protected $table = 'proyecto_modulo';
  public $fillable = ['proyecto_id','modulo_id','propietario'];

  public static function proyectomodulo($idproyecto,$propietario,$idmodulo){
    return DB::table('proyecto_modulo')
                    //->join('modulos', 'user_modulo.modulo_id', '=', 'modulos.id')
                    ->where('proyecto_modulo.proyecto_id','=', $idproyecto)
                    ->where('proyecto_modulo.propietario','=', $propietario)
                    ->where('proyecto_modulo.modulo_id', '=', $idmodulo)
                    //->select('user_imagenes.*','imagenes.modulo_id')
                    ->first();
  }

  public static function proyectomodulov2($idproyecto,$propietario,$idmodulo){
    return Proyecto_Modulo::where('proyecto_modulo.proyecto_id', $idproyecto)
                            ->where('proyecto_modulo.propietario', $propietario)
                            ->where('proyecto_modulo.modulo_id', $idmodulo)
                            ->first();
  }

  public static function modulos_editados($id)
  {
    return Proyecto_Modulo::where('proyecto_id',$id)
                            ->where('propietario','revisado')
                            ->pluck('modulo_id');
  }

}

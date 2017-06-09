<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proyecto_Imagen extends Model
{
    protected $table = 'proyectos_imagenes';
    public $fillable = ['proyecto_id','imagen_id','propietario'];

    // Obtiene el proyecto_imagen en especifico
	public static function proyectoimagen($idproyecto,$propietario,$idmodulo)
	{
    	return DB::table('proyectos_imagenes')
                    ->join('imagenes', 'proyectos_imagenes.imagen_id', '=', 'imagenes.id')
                    ->where('proyectos_imagenes.proyecto_id','=', $idproyecto)
                    ->where('proyectos_imagenes.propietario','=', $propietario)
                    ->where('imagenes.modulo_id', '=', $idmodulo)
                    ->select('proyectos_imagenes.*','imagenes.modulo_id')
                    ->first();
  	}


  	// Actualiza la información de proyecto_imagen en especifico
	public static function actualizaimagen($idproyecto,$propietario,$idmodulo,$imagen_id)
	{
	    return DB::table('proyectos_imagenes')
	                    ->join('imagenes', 'proyectos_imagenes.imagen_id', '=', 'imagenes.id')
	                    ->where('proyectos_imagenes.proyecto_id','=', $idproyecto)
	                    ->where('proyectos_imagenes.propietario','=', $propietario)
	                    ->where('imagenes.modulo_id', '=', $idmodulo)
	                    //->select('user_parrafos.*','parrafos.modulo_id')
	                    ->update(['proyectos_imagenes.imagen_id'=>$imagen_id]);
	}
}

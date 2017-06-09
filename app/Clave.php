<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Datatables;

class Clave extends Model
{
    protected $table = 'claves';
    public $fillable = ['nombre','identificador','modulo_id','ejemplo'];

    // Obtiene los claves y el modulo propietario
		public static function modulos()
    {
			return DB::table('claves')
											->join('modulos', 'modulos.id', '=', 'claves.modulo_id')
											->select('claves.*', 'modulos.modulo')
                      ->orderBy('modulos.modulo', 'asc')
                      ->orderBy('claves.nombre', 'asc')
											->paginate(10);
		}

    // Obtiene las claves de un usuario y propietario en especifico
		public static function clavesmodulo($id,$iduser,$propietario)
    {
			return DB::table('claves')
                      ->select('claves.*',
                      DB::raw('(SELECT user_claves.valor
                                FROM user_claves
                                 WHERE user_claves.clave_id=claves.id
                                 and user_claves.user_id='.$iduser.'
                                 and user_claves.propietario="'.$propietario.'") as valor')
                              )
											->where('claves.modulo_id', '=', $id)
											->get();
		}

    // Obtiene las claves de un proyecto y propieratio en especifico
    public static function clavesmoduloproyecto($id,$idproyecto,$propietario)
    {
			return DB::table('claves')
                      ->select('claves.*',
                      DB::raw('(SELECT proyectos_claves.valor
                                FROM proyectos_claves
                                 WHERE proyectos_claves.clave_id=claves.id
                                 and proyectos_claves.proyecto_id='.$idproyecto.'
                                 and proyectos_claves.propietario="'.$propietario.'") as valor')
                              )
											->where('claves.modulo_id', '=', $id)
											->get();
		}

    // Obtiene las claves para mostralas con la libreria DataTable
    public static function apiclaves()
    {
      return Datatables::queryBuilder(
            DB::table('claves')
                      ->select('claves.*', 
                          DB::raw('(SELECT modulos.modulo
                                 FROM modulos
                                  WHERE modulos.id=claves.modulo_id) as modulo')
                        )
            )->make(true);
    }


}

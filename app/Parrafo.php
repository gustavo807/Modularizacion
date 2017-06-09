<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Datatables;

class Parrafo extends Model
{
    protected $table = 'parrafos';
    public $fillable = ['parrafo','modulo_id'];

    // Obtiene los parrafos de un modulo en especifico
		public static function modulos()
    {
			return DB::table('parrafos')
											->join('modulos', 'modulos.id', '=', 'parrafos.modulo_id')
											->select('parrafos.*', 'modulos.modulo')
                      ->orderBy('modulos.modulo', 'asc')
                      ->orderBy('parrafos.parrafo', 'asc')
											->paginate(10);
		}

    // Obtiene los parrafos de un modulo en especifico
    public static function parrafosmodulos($idmodulo)
    {
			return DB::table('parrafos')
											//->join('modulos', 'modulos.id', '=', 'parrafos.modulo_id')
											->where('parrafos.modulo_id','=', $idmodulo)
											->get();
		}

    // Obtiene los parrafos mediante la libreria DataTable
	  public static function apiparrafos()
    {
      return Datatables::queryBuilder(
            DB::table('parrafos')
                      ->select('parrafos.*', 
                          DB::raw('(SELECT modulos.modulo
                                 FROM modulos
                                  WHERE modulos.id=parrafos.modulo_id) as modulo')
                        )
            )->make(true);
    }

}

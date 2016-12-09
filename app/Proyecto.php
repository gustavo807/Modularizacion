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


    public static function empresasproyectos(){
      return DB::table('proyectos')
                ->select('proyectos.*',
                DB::raw('(SELECT users.nombre FROM users WHERE proyectos.user_id=users.id) as empresa'),
                DB::raw('(SELECT convocatorias.convocatoria FROM convocatorias WHERE proyectos.convocatoria_id=convocatorias.id ) as convocatoria'),
                DB::raw('(SELECT count(*) FROM proyecto_modulo WHERE proyecto_modulo.proyecto_id=proyectos.id
                                                               AND proyecto_modulo.propietario="empresa") as modulo')
                        )
                ->orderBy('empresa', 'asc')
                ->orderBy('proyectos.nombre', 'asc')
                ->paginate(10);
    }

    public static function proyectodescripcion($idproyecto){
      return DB::table('proyectos')
                ->join('convocatorias','proyectos.convocatoria_id','=','convocatorias.id')
                ->join('instituciones','convocatorias.institucion_id','=','instituciones.id')
                ->join('programas','instituciones.programa_id','=','programas.id')
                ->select('proyectos.user_id','proyectos.nombre', 'proyectos.descripcion','convocatorias.convocatoria','instituciones.institucion','programas.programa')
                ->where('proyectos.id', '=',$idproyecto)
                ->first();
    }


}


/*
SELECT (SELECT users.nombre FROM users WHERE proyectos.user_id=users.id) as empresa,
				proyectos.nombre,
                (SELECT convocatorias.convocatoria FROM convocatorias WHERE proyectos.convocatoria_id=convocatorias.id) as convocatoria,
                ( SELECT COUNT(*)
                     FROM proyecto_modulo
                     WHERE proyecto_modulo.proyecto_id=proyectos.id
                     AND proyecto_modulo.propietario='empresa') as modulo
FROM proyectos
*/
















//

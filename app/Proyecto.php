<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Datatables;

class Proyecto extends Model
{
	//use SoftDeletes;

    protected $table = 'proyectos';
    public $fillable = ['nombre','descripcion','convocatoria_id','estado','ciudad','user_id'];

    //protected $dates = ['deleted_at'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function sedes()
    {
        return $this->belongsToMany('App\Sede');
    }

    public function convocatoria()
    {
      return $this->belongsTo('App\Convocatoria');
    }

    public function investigadores()
    {
        return $this->belongsToMany('App\Researcher');
    }

    public function partidas()
    {
        return $this->belongsToMany('App\Partida');
    }

    public function registros()
    {
      return $this->morphMany('App\Registro','registroable');
    }

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

    public static function webservice(){
      return DB::table('proyectos')
                ->select('proyectos.id','proyectos.nombre','proyectos.descripcion','proyectos.created_at as fecha', DB::raw('(SELECT count(*) FROM modulos WHERE modulos.clasificacion_id=2) as total'),
                DB::raw('(SELECT users.nombre FROM users WHERE proyectos.user_id=users.id) as empresa'),
                DB::raw('(SELECT convocatorias.convocatoria FROM convocatorias WHERE proyectos.convocatoria_id=convocatorias.id ) as convocatoria'),
                DB::raw('(SELECT count(*) FROM proyecto_modulo WHERE proyecto_modulo.proyecto_id=proyectos.id
                                                               AND proyecto_modulo.propietario="empresa") as modulo')
                        )
                ->orderBy('empresa', 'asc')
                ->orderBy('proyectos.nombre', 'asc')
                ->get();
    }

    public static function showwebservice($id){
      return DB::table('proyectos')
                ->select('proyectos.id','proyectos.nombre','proyectos.descripcion','proyectos.created_at as fecha', DB::raw('(SELECT count(*) FROM modulos WHERE modulos.clasificacion_id=2) as total'),
                DB::raw('(SELECT users.nombre FROM users WHERE proyectos.user_id=users.id) as empresa'),
                DB::raw('(SELECT convocatorias.convocatoria FROM convocatorias WHERE proyectos.convocatoria_id=convocatorias.id ) as convocatoria'),
                DB::raw('(SELECT count(*) FROM proyecto_modulo WHERE proyecto_modulo.proyecto_id=proyectos.id
                                                               AND proyecto_modulo.propietario="empresa") as modulo')
                        )
                ->where('proyectos.id','=',$id)
                ->get();
    }

    public static function apiproyectos()
    {
        //return "hola";
      return Datatables::queryBuilder(
       DB::table('proyectos')
       ->select('proyectos.*',
        DB::raw('(SELECT users.nombre FROM users WHERE proyectos.user_id=users.id) as empresa'),
        DB::raw('(SELECT convocatorias.convocatoria FROM convocatorias WHERE proyectos.convocatoria_id=convocatorias.id ) as convocatoria'),
        DB::raw('(SELECT count(*) FROM proyecto_modulo WHERE proyecto_modulo.proyecto_id=proyectos.id
         AND proyecto_modulo.propietario="empresa") as modulo'),
        DB::raw('(select registros.nombre 
                     from registros 
                     where registros.registroable_id=proyectos.id 
                     AND registros.registroable_type = "App\\\Proyecto") as editado')
        )         
       )->make(true);
      
    }


    public static function copyproyecto_borra($proyecto_id)
    {
        DB::table('proyecto_modulo')->where('proyecto_id', $proyecto_id)->where('propietario', 'asesor')->delete();

        DB::table('proyectos_claves')->where('proyecto_id', $proyecto_id)->where('propietario', 'asesor')->delete();

        DB::table('proyectos_parrafos')->where('proyecto_id', $proyecto_id)->where('propietario', 'asesor')->delete();

        DB::table('proyectos_imagenes')->where('proyecto_id', $proyecto_id)->where('propietario', 'asesor')->delete();
    }

    public static function copyproyecto_crea($proyecto_id)
    {
        DB::insert('insert into proyecto_modulo (proyecto_id, modulo_id,propietario)
                        select proyecto_id, modulo_id, "asesor" as propietario
                        from proyecto_modulo
                        where propietario=?
                        and proyecto_id=? ', ['empresa',$proyecto_id]);

        DB::insert('insert into proyectos_claves (proyecto_id, clave_id, valor, propietario)
                        select proyecto_id, clave_id, valor, "asesor" as propietario
                        from proyectos_claves
                        where propietario=?
                        and proyecto_id=? ', ['empresa',$proyecto_id]);

        DB::insert('insert into proyectos_parrafos (proyecto_id, parrafo_id, observacion, propietario)
                        select proyecto_id, parrafo_id, observacion, "asesor" as propietario
                        from proyectos_parrafos
                        where propietario=?
                        and proyecto_id=? ', ['empresa',$proyecto_id]);

        DB::insert('insert into proyectos_imagenes (proyecto_id, imagen_id, propietario)
                        select proyecto_id, imagen_id, "asesor" as propietario
                        from proyectos_imagenes
                        where propietario=?
                        and proyecto_id=? ', ['empresa',$proyecto_id]);


    }

    public static function sede_proyectos($sede_id,$tipo='paginate')
    {
        $valor = '10';
        if($tipo != 'paginate')
        {
            $tipo='get';
            $valor='';
        }

        return DB::table('proyectos')
                        ->join('proyecto_sede', 'proyectos.id', '=', 'proyecto_sede.proyecto_id')
                        ->join('users', 'proyectos.user_id', '=', 'users.id')
                        ->join('convocatorias', 'proyectos.convocatoria_id', '=', 'convocatorias.id')
                        ->where('proyecto_sede.sede_id', $sede_id)
                        ->select('proyectos.*','users.nombre as user','convocatorias.convocatoria')
                        ->$tipo($valor);
    }

//A) Documentos jurídicos de la empresa 3.-Constancia de Situación Fiscal (CSF) (Del año en curso)

    
   /* public static function proyectodescripcion($idproyecto){
      return DB::table('proyectos')
                ->join('convocatorias','proyectos.convocatoria_id','=','convocatorias.id')
                ->join('instituciones','convocatorias.institucion_id','=','instituciones.id')
                ->join('programas','instituciones.programa_id','=','programas.id')
                ->select('proyectos.user_id','proyectos.nombre', 'proyectos.descripcion','convocatorias.convocatoria','instituciones.institucion','programas.programa')
                ->where('proyectos.id', '=',$idproyecto)
                ->first();
    }
*/

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

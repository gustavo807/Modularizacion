<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Datatables;

class Researcher extends Model
{
    public $fillable = ['nombre','apellidopaterno','apellidomaterno','sexo','usuarioconacyt','correo',
    			 'telefono','grado','campo','sni','informacion','actividades','entregables','sede_id'];

    public function sede()
    {
        return $this->belongsTo('App\Sede');
    }

    public function proyectos()
    {
        return $this->belongsToMany('App\Proyecto');
    }

   	public static function api()
    {
      return Datatables::queryBuilder(
      		DB::table('researchers')
      				->join('sedes', 'sedes.id', '=', 'researchers.sede_id')
            		->join('users', 'users.id', '=', 'sedes.user_id')
       				->select('researchers.*','users.nombre as sede')				         
       )->make(true);
    }

    public static function grados()
    {
    	return [
    		'Licenciatura'=>'Licenciatura',
    		'Maestría'=>'Maestría',
    		'Doctorado'=>'Doctorado',
    		'Postdoctorado'=>'Postdoctorado'
    	];
    }


    public static function findgrado($valor)
    {
    	$grados = Researcher::grados();
        if(! in_array($valor, $grados)) abort(403);
    }

    public static function campos()
    {
    	return [
    		'Disciplina'=>'Disciplina',
    		'Subdiciplina'=>'Subdiciplina',
    		'Especialidad'=>'Especialidad'
    	];
    }

    public static function findcampo($valor)
    {
        $campos = Researcher::campos();
        if(! in_array($valor, $campos)) abort(403);
    }

    public static function sni()
    {
    	return [
    		'Candidato'=>'Candidato',
    		'SNI I'=>'SNI I',
    		'SNI II'=>'SNI II',
    		'SNI III'=>'SNI III'
    	];
    }

    public static function findsni($valor)
    {
        $sni = Researcher::sni();
        if(! in_array($valor, $sni)) abort(403);
    }

    public static function findsexo($valor)
    {
        $array = ['F','M'];
        if(! in_array($valor, $array)) abort(403);
    }

    public static function valida($grado,$campo,$sni,$sexo,$sede_id)
    {
        Researcher::findgrado($grado);
        Researcher::findcampo($campo);
        Researcher::findsni($sni);
        Researcher::findsexo($sexo);
        Sede::findsede($sede_id);
    }

    public static function proyecto_investigadores($proyecto_id,$tipo='paginate')
    {
        $valor = '10';
        if($tipo != 'paginate')
        {
            $tipo='get';
            $valor='';
        }

        return DB::table('researchers')
                        ->join('proyecto_researcher', 'researchers.id', '=', 'proyecto_researcher.researcher_id')
                        ->join('sedes', 'researchers.sede_id', '=', 'sedes.id')
                        ->join('users', 'sedes.user_id', '=', 'users.id')
                        ->where('proyecto_researcher.proyecto_id', $proyecto_id)
                        ->select('researchers.*','users.nombre as sede')
                        ->$tipo($valor);
    }


}

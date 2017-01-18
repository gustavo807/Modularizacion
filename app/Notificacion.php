<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\WSNotificacion;

class Notificacion extends Model
{
	public static function sendnotification_convocatoria($idmodulo, $proyecto_id,$empresa,$proyecto)
	{
		$total = DB::table('modulos')
			->where('modulos.clasificacion_id', 2)
			->count();

		$contestados = DB::table('proyecto_modulo')
			->where('proyecto_modulo.proyecto_id', $proyecto_id)
			->where('proyecto_modulo.propietario', "empresa")
			->count();

		if($contestados  == 10)
			WSNotificacion::sendnotification($empresa,"10/".$total." Módulos. ".$proyecto);

		elseif($contestados  == 20)
			WSNotificacion::sendnotification($empresa,"20/".$total." Módulos. ".$proyecto);

		elseif($contestados  == 30)
			WSNotificacion::sendnotification($empresa,"30/".$total." Módulos. ".$proyecto);
		
		elseif($contestados == 40)
			WSNotificacion::sendnotification($empresa,"40/".$total." Módulos. ".$proyecto);

		elseif($contestados == $total)
			WSNotificacion::sendnotification($empresa,$idmodulo."/".$total." Módulos. ".$proyecto);		
	}

	public static function sendnotification_general($idmodulo, $empresa, $empresa_id)
	{
		$total = DB::table('modulos')
			->where('modulos.clasificacion_id', 1)
			->count();

		$contestados = DB::table('user_modulo')
			->where('user_modulo.user_id', $empresa_id)
			->where('user_modulo.propietario', "empresa")
			->count();

		if ($contestados == 10)
			WSNotificacion::sendnotification($empresa,"10/".$total." Módulos Generales");
		
		elseif ($contestados == 20)
			WSNotificacion::sendnotification($empresa,"20/".$total." Módulos Generales");
		
		elseif ($total == $contestados)
			WSNotificacion::sendnotification($empresa,$contestados."/".$total." Módulos Generales");
		
	}

    
}

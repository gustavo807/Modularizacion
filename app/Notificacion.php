<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\WSNotificacion;

class Notificacion extends Model
{
	// Modelo para enviar notificaciones de los modulos de convocatoria
	public static function sendnotification_convocatoria($idmodulo, $empresa,$proyecto)
	{
		$total = DB::table('modulos')
			->where('modulos.clasificacion_id', 2)
			->count();

		if($idmodulo  == 10)
			WSNotificacion::sendnotification($empresa,"10/".$total." Módulos. ".$proyecto);

		elseif($idmodulo  == 20)
			WSNotificacion::sendnotification($empresa,"20/".$total." Módulos. ".$proyecto);

		elseif($idmodulo  == 30)
			WSNotificacion::sendnotification($empresa,"30/".$total." Módulos. ".$proyecto);
		
		elseif($idmodulo == 40)
			WSNotificacion::sendnotification($empresa,"40/".$total." Módulos. ".$proyecto);

		elseif($idmodulo == $total)
			WSNotificacion::sendnotification($empresa,$idmodulo."/".$total." Módulos. ".$proyecto);		
	}

	// Modelo para enviar notificaciones de los modulos generales
	public static function sendnotification_general($idmodulo, $empresa)
	{
		$total = DB::table('modulos')
			->where('modulos.clasificacion_id', 1)
			->count();

		if ($idmodulo == 10)
			WSNotificacion::sendnotification($empresa,"10/".$total." Módulos Generales");
		
		elseif ($idmodulo == 20)
			WSNotificacion::sendnotification($empresa,"20/".$total." Módulos Generales");
		
		elseif ($total == $idmodulo)
			WSNotificacion::sendnotification($empresa,$idmodulo."/".$total." Módulos Generales");
		
	}

    
}

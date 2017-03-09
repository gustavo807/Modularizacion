<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{

    public $fillable = ['estado'];

    public static function estados()
    {
    	return [
    	'AGS' => 'Aguascalientes (AGS)',
		'BCN' => 'Baja California (BCN)',
		'BCS' => 'Baja California Sur (BCS)',
		'CAM' => 'Campeche (CAM)',
		'CHP' => 'Chiapas (CHP)',
		'CHH' => 'Chihuahua (CHH)',
		'COA' => 'Coahuila (COA)',
		'COL' => 'Colima (COL)',
		'CMX' => 'Ciudad de México (CMX)',
		'DGO' => 'Durango (DGO)',
		'GTO' => 'Guanajuato (GTO)',
		'GRO' => 'Guerrero (GRO)',
		'HID' => 'Hidalgo (HID)',
		'JAL' => 'Jalisco (JAL)',
		'MEX' => 'Estado de México (MEX)',
		'MCH' => 'Michoacán (MCH)',
		'MOR' => 'Morelos (MOR)',
		'NAY' => 'Nayarit (NAY)',
		'NLE' => 'Nuevo León (NLE)',
		'OAX' => 'Oaxaca (OAX)',
		'PUE' => 'Puebla (PUE)',
		'QRO' => 'Querétaro (QRO)',
		'ROO' => 'Quintana Roo (ROO)',
		'SLP' => 'San Luis Potosí (SLP)',
		'SIN' => 'Sinaloa (SIN)',
		'SON' => 'Sonora (SON)',
		'TAB' => 'Tabasco (TAB)',
		'TAM' => 'Tamaulipas (TAM)',
		'TLX' => 'Tlaxcala (TLX)',
		'VER' => 'Veracruz (VER)',
		'YUC' => 'Yucatán (YUC)',
		'ZAC' => 'Zacatecas (ZAC)'
    	];
    }

    public static function findestado($valor)
    {
    	$estados = array_keys(Estado::estados());
        if(! in_array($valor, $estados)) abort(403);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evariables extends Model
{
    protected $table = 'evariables';
    public $fillable = ['opcion','categoria','variable','porcentaje'];

    // Obtiene las variables de acuerdo a la categoria y variable 
    public static function getdatos($categoria,$variable)
    {
    return DB::table('evariables')
                    ->select('evariables.*')
                    ->where('evariables.categoria', $categoria)
                    ->where('evariables.variable', $variable)
                    ->get();
  }

}

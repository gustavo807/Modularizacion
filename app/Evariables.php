<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evariables extends Model
{
    protected $table = 'evariables';
    public $fillable = ['opcion','categoria','variable','porcentaje'];

    public static function getdatos($categoria,$variable){
    return DB::table('evariables')
                    ->select('evariables.*')
                    ->where('evariables.categoria', $categoria)
                    ->where('evariables.variable', $variable)
                    ->get();
  }

}

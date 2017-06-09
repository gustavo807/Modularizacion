<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Datatables;

class Categoria extends Model
{
    protected $table = 'categorias';
    public $fillable = ['categoria'];

    // Funcion para obtener las categorias
    public static function apicategorias()
    {
      return Datatables::eloquent(Categoria::query())->make(true);
    }

}

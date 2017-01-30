<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Datatables;

class Categoria extends Model
{
    //use SoftDeletes;
    protected $table = 'categorias';
    public $fillable = ['categoria'];

    //protected $dates = ['deleted_at'];

    public static function apicategorias()
    {
      return Datatables::eloquent(Categoria::query())->make(true);
    }

}

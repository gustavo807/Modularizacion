<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Convocatoria extends Model
{
	//use SoftDeletes;

    protected $table = 'convocatorias';
    public $fillable = ['convocatoria','descripcion','institucion_id', 'fondos_id'];

    //protected $dates = ['deleted_at'];
}

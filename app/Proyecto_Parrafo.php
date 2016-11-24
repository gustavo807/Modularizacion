<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto_Parrafo extends Model
{
	use SoftDeletes;

    protected $table = 'proyectos_parrafos';
    public $fillable = ['valor','observacion','proyecto_id','parrafo_id'];

    protected $dates = ['deleted_at'];
}

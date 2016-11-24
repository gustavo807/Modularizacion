<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto_Clave extends Model
{
	use SoftDeletes;

    protected $table = 'proyectos_claves';
    public $fillable = ['valor','proyecto_id','clave_id'];

    protected $dates = ['deleted_at'];
}

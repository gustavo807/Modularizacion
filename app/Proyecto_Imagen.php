<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto_Imagen extends Model
{
	use SoftDeletes;

    protected $table = 'proyectos_imagenes';
    public $fillable = ['valor','proyecto_id','imagen_id'];

    protected $dates = ['deleted_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto_Imagen extends Model
{
    protected $table = 'proyectos_imagenes';
    public $fillable = ['valor','proyecto_id','imagen_id'];
}

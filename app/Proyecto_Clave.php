<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto_Clave extends Model
{
    protected $table = 'proyectos_claves';
    public $fillable = ['valor','proyecto_id','clave_id'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto_Parrafo extends Model
{
    protected $table = 'proyectos_parrafos';
    public $fillable = ['valor','observacion','proyecto_id','parrafo_id'];
}

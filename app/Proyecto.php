<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';
    public $fillable = ['nombre','descripcion','convocatoria_id','empresa_id'];
}

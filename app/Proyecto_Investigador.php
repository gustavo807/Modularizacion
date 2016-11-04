<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto_Investigador extends Model
{
    protected $table = 'proyectos_investigadores';
    public $fillable = ['puesto','proyecto_id','investigador_id'];
}

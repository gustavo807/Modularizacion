<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto_Vinculado extends Model
{
    protected $table = 'proyectos_vinculados';
    public $fillable = ['proyecto_id','vinculado_id'];
}

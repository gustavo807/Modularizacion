<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto_Investigador extends Model
{
	use SoftDeletes;

    protected $table = 'proyectos_investigadores';
    public $fillable = ['puesto','proyecto_id','investigador_id'];

    protected $dates = ['deleted_at'];
}

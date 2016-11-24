<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto extends Model
{
	use SoftDeletes;

    protected $table = 'proyectos';
    public $fillable = ['nombre','descripcion','convocatoria_id','empresa_id'];

    protected $dates = ['deleted_at'];
}

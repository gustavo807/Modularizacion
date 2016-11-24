<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto_Vinculado extends Model
{
	use SoftDeletes;

    protected $table = 'proyectos_vinculados';
    public $fillable = ['proyecto_id','vinculado_id'];

    protected $dates = ['deleted_at'];
}

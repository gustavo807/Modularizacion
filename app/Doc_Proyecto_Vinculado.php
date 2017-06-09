<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doc_Proyecto_Vinculado extends Model
{
	use SoftDeletes;

    protected $table = 'doc_proyectos_vinculados';
    public $fillable = ['documento','otro','proyecto_id','vinculado_id'];

    protected $dates = ['deleted_at'];
}


// Este modelo no se utiliza en este momento, pero puede servir en un futuro
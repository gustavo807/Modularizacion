<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doc_Proyecto_Empresa extends Model
{
	use SoftDeletes;
	
    protected $table = 'doc_proyectos_empresas';
    public $fillable = ['documento','otro','proyecto_id'];

    protected $dates = ['deleted_at'];
}

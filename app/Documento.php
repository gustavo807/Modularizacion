<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
	//use SoftDeletes;

    protected $table = 'documentos';
    public $fillable = ['nombre','rol_id','categoria_id'];

    //protected $dates = ['deleted_at'];
}

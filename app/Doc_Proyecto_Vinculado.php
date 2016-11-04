<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc_Proyecto_Vinculado extends Model
{
    protected $table = 'doc_proyectos_vinculados';
    public $fillable = ['documento','otro','proyecto_id','vinculado_id'];
}

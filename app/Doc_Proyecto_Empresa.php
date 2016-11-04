<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc_Proyecto_Empresa extends Model
{
    protected $table = 'doc_proyectos_empresas';
    public $fillable = ['documento','otro','proyecto_id'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc_Empresa extends Model
{
    protected $table = 'doc_empresas';
    public $fillable = ['documento','empresa_id'];
}

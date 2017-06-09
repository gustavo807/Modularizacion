<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doc_Vinculado extends Model
{
	use SoftDeletes;

    protected $table = 'doc_vinculados';
    public $fillable = ['documento','vinculado_id'];

    protected $dates = ['deleted_at'];
}


// Este modelo no se utiliza en este momento, pero puede servir en un futuro
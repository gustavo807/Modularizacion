<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc_Vinculado extends Model
{
    protected $table = 'doc_vinculados';
    public $fillable = ['documento','vinculado_id'];
}

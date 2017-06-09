<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{

    protected $table = 'programas';
    public $fillable = ['programa'];
}


// Este modelo no se utiliza pero se puede utilzar en un futuro
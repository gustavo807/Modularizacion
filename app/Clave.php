<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clave extends Model
{
    protected $table = 'claves';
    public $fillable = ['nombre','identificador','modulo_id','clasificacion_id'];
}

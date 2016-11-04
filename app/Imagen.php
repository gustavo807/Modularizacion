<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';
    public $fillable = ['imagen','descripcion','referencia','modulo_id'];
}

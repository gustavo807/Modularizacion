<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    protected $table = 'convocatorias';
    public $fillable = ['convocatoria','descripcion','institucion_id'];
}

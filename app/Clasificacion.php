<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
  protected $table = 'clasificaciones';
  public $fillable = ['clasificacion'];
}

// Este modelo no se utiliza en este momento, pero puede servir en el futuro

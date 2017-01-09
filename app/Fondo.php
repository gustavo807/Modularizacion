<?php

namespace App;

use App\Institucion;
use Illuminate\Database\Eloquent\Model;

class Fondo extends Model
{
  protected $table = 'fondos';

  public $fillable = ['fondo', 'descripcion'];

  public function instituciones(){
    return $this->belongsToMany(Institucion::class)->withTimestamps();
  }
}

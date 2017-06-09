<?php

namespace App;

use App\Institucion;
use Illuminate\Database\Eloquent\Model;

class Fondo extends Model
{
  protected $table = 'fondos';

  public $fillable = ['fondo', 'descripcion'];

  // Eloquent "uno a muchos"
  public function instituciones()
  {
    return $this->belongsToMany(Institucion::class)->withTimestamps();
  }
}

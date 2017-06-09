<?php

namespace App;

use App\Fondo;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{

    protected $table = 'instituciones';

    public $fillable = ['institucion','programa_id'];

    // Eloquent "uno a muchos"
    public function fondos()
    {
      return $this->belongsToMany(Fondo::class)->withTimestamps();
    }
}

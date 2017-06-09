<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dirigido extends Model
{
    public $fillable = ['nombre'];

    // Eloquent "uno a muchos"
    public function convocatorias()
    {
    	return $this->belongsToMany('App\Convocatoria');
    }
}

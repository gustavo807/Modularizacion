<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dirigido extends Model
{
    public $fillable = ['nombre'];

    public function convocatorias()
    {
    	return $this->belongsToMany('App\Convocatoria');
    }
}

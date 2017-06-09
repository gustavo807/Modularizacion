<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{

    protected $table = 'convocatorias';
    public $fillable = ['convocatoria','descripcion','institucion_id', 'fondos_id'];

    // Eloquent "Uno a muchos" 
    public function dirigidos()
    {
    	return $this->belongsToMany('App\Dirigido');
    }

    // Eloquent "uno a muchos"
    public function proyecto()
    {
    	return $this->hasMany('App\Proyecto');
    }

}

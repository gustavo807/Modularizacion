<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vinculado extends Model
{
    protected $table = 'vinculados';
    public $fillable = ['nombre','email','password','descripcion','website','video',
    					'contacto_nombre','contacto_email','contacto_telefono',
    					'direccion','rol_id','ciudad_id'];
}

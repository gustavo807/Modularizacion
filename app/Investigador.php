<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigador extends Model
{
    protected $table = 'investigadores';
    public $fillable = ['nombre','trayectoria','foto','email','usuario_conacyt',
    					'password_conacyt','vinculado_id'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investigador extends Model
{
	use SoftDeletes;

    protected $table = 'investigadores';
    public $fillable = ['nombre','trayectoria','foto','email','usuario_conacyt',
    					'password_conacyt','vinculado_id'];

	protected $dates = ['deleted_at'];    					
}


// Este modelo no se utiliza pero puede servir en un futuro
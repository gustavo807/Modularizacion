<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
	use SoftDeletes;

    protected $table = 'roles';
    public $fillable = ['rol'];

    protected $dates = ['deleted_at'];
}


// Este modelo no se utiliza pero en un futuro se puede utilizar
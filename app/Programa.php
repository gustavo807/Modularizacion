<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Programa extends Model
{
	//use SoftDeletes;

    protected $table = 'programas';
    public $fillable = ['programa'];

    //protected $dates = ['deleted_at'];
}

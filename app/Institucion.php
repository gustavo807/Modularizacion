<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Institucion extends Model
{
	//use SoftDeletes;

    protected $table = 'instituciones';
    public $fillable = ['institucion','programa_id'];

    //protected $dates = ['deleted_at'];
}

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

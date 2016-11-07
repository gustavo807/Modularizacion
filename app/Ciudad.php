<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciudad extends Model
{
	use SoftDeletes;

    protected $table = 'ciudades';
    public $fillable = ['ciudad','estado_id'];

    protected $dates = ['deleted_at'];
}

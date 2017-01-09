<?php

namespace App;

use App\Fondo;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Institucion extends Model
{
	//use SoftDeletes;

    protected $table = 'instituciones';

    public $fillable = ['institucion','programa_id'];

    public function fondos(){
      return $this->belongsToMany(Fondo::class)->withTimestamps();
    }
    //protected $dates = ['deleted_at'];
}

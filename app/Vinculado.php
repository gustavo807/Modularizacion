<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vinculado extends Model
{
	//use SoftDeletes;

    protected $table = 'vinculados';
    public $fillable = ['descripcion','website','video',
    					'contacto_nombre','contacto_email','contacto_telefono',
    					'direccion','user_id','ciudad_id'];

    //protected $dates = ['deleted_at'];

    public function ciudad()
    {
    	return $this->belongsTo('App\Ciudad','ciudad_id');
    }

    

}

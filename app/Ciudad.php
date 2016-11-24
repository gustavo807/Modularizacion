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

    public static function towns($id){
    	return Ciudad::where('estado_id','=',$id)
    	->get();
    }

    public function vinculados()
    {
        return $this->hasMany('App\Vinculado');
    }

}

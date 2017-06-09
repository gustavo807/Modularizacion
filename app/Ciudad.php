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

    // Funcion para obtener las ciudades
    public static function towns($id)
    {
    	return Ciudad::where('estado_id','=',$id)
    	->get();
    }

    // Eloquent "Una ciudad tiene muchos vinculados"
    public function vinculados()
    {
        return $this->hasMany('App\Vinculado');
    }

}

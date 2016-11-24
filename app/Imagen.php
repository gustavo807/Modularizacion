<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Imagen extends Model
{
	//use SoftDeletes;

    protected $table = 'imagenes';
    public $fillable = ['imagen','descripcion','referencia','modulo_id'];

    //protected $dates = ['deleted_at'];

		public function setImagenAttribute($imagen){
      	if(! empty($imagen)){
  			$name = Carbon::now()->second.$imagen->getClientOriginalName();
  			$this->attributes['imagen'] = $name;
  			\Storage::disk('local')->put($name, \File::get($imagen));
      	}
  	}

		public static function modulos(){
			return DB::table('imagenes')
											->join('modulos', 'modulos.id', '=', 'imagenes.modulo_id')
											->select('imagenes.*', 'modulos.modulo')
											->get();
		}

}

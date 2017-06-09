<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Datatables;
use Carbon\Carbon;

class Institution extends Model
{
    public $fillable = ['nombre','logo','paginaweb','reniecyt','linkvideo'];

    // Eloquent uno a  muchos
    public function sedes()
    {
        return $this->hasMany('App\Sede');
    }

    // Obtiene las intituciones para mostralas con DataTable
    public static function api()
    {
      return Datatables::eloquent(Institution::query())->make(true);
    }

    // Agrega al nombre  del logo el segundo en que fue subido
    public function setLogoAttribute($logo)
    {
        if(! empty($logo)){
        $name = Carbon::now()->second.$logo->getClientOriginalName();
        $this->attributes['logo'] = $name;
        \Storage::disk('local')->put($name, \File::get($logo));
        }
    }

}

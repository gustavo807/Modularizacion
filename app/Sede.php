<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Datatables;

class Sede extends Model
{
    public $fillable = ['paginaweb','direccion','linkgooglemaps','descripcion','contacto','telefono','correo','user_id','institution_id'];

    // Relaciones Eloquent
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function proyectos()
    {
        return $this->belongsToMany('App\Proyecto');
    }

    public function investigadores()
    {
        return $this->hasMany('App\Researcher');
    }

    public function partidas()
    {
        return $this->hasMany('App\Partida');
    }

    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }

    // Obtiene la información de DataTable
    public static function api()
    {
      return Datatables::eloquent(
      			User::where('rol_id','2')
      		)->make(true);
    }

    // Obtiene la información de sedes
    public static function sedes()
    {
      return Sede::join('users', 'users.id', '=', 'sedes.user_id')
       				->select('sedes.*','users.nombre')
       				->get();				         
       
    }

    // Busca en valor, sino está abort
    public static function findsede($valor)
    {
        $s = Sede::pluck('id');
        if(! $s->contains($valor)) abort(403);
    }


}

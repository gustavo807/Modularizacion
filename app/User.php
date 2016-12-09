<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'password','rol_id','activo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function boot()
    {
      parent::boot();

      static::creating(function($user){
        $user->token = str_random(30);
      });

    }

    public function confirmEmail()
    {
      $this->activo = true;
      $this->token = null;

      $this->save();
    }


    public static function copyempresa_crea($user_id){
      DB::insert('insert into user_modulo (user_id, modulo_id,propietario)
                        select user_id, modulo_id, "asesor" as propietario
                        from user_modulo where propietario=? and user_id=? ', ['empresa',$user_id]);

      DB::insert('insert into user_claves (user_id, clave_id, valor, propietario)
                        select user_id, clave_id, valor, "asesor" as propietario
                        from user_claves where propietario=? and user_id=? ', ['empresa',$user_id]);

      DB::insert('insert into user_parrafos (user_id, parrafo_id, observacion, propietario)
                        select user_id, parrafo_id, observacion, "asesor" as propietario
                        from user_parrafos where propietario=? and user_id=? ', ['empresa',$user_id]);

      DB::insert('insert into user_imagenes (user_id, imagen_id, propietario)
                        select user_id, imagen_id, "asesor" as propietario
                        from user_imagenes where propietario=? and user_id=? ', ['empresa',$user_id]);


      DB::insert('insert into proyecto_modulo (proyecto_id, modulo_id,propietario)
                        select proyecto_id, modulo_id, "asesor" as propietario
                        from proyecto_modulo
                        where propietario=?
                        and proyecto_id in (select id from proyectos where user_id=? )', ['empresa',$user_id]);

      DB::insert('insert into proyectos_claves (proyecto_id, clave_id, valor, propietario)
                        select proyecto_id, clave_id, valor, "asesor" as propietario
                        from proyectos_claves
                        where propietario=?
                        and proyecto_id in (select id from proyectos where user_id=? )', ['empresa',$user_id]);

      DB::insert('insert into proyectos_parrafos (proyecto_id, parrafo_id, observacion, propietario)
                        select proyecto_id, parrafo_id, observacion, "asesor" as propietario
                        from proyectos_parrafos
                        where propietario=?
                        and proyecto_id in (select id from proyectos where user_id=? )', ['empresa',$user_id]);

      DB::insert('insert into proyectos_imagenes (proyecto_id, imagen_id, propietario)
                        select proyecto_id, imagen_id, "asesor" as propietario
                        from proyectos_imagenes
                        where propietario=?
                        and proyecto_id in (select id from proyectos where user_id=? )', ['empresa',$user_id]);

      //return DB::table('user_modulo')->select('user_id','modulo_id', DB::raw("'asesor' AS propietario"))
      //        ->where('user_id', '=', $user_id)->where('propietario', '=', 'empresa')->get();
    }


    public static function copyempresa_borra($user_id){
        DB::table('user_modulo')->where('user_id', '=', $user_id)->where('propietario', '=', 'asesor')->delete();
        DB::table('user_claves')->where('user_id', '=', $user_id)->where('propietario', '=', 'asesor')->delete();
        DB::table('user_parrafos')->where('user_id', '=', $user_id)->where('propietario', '=', 'asesor')->delete();
        DB::table('user_imagenes')->where('user_id', '=', $user_id)->where('propietario', '=', 'asesor')->delete();

        DB::table('proyecto_modulo')
                                    ->whereIn('proyecto_modulo.proyecto_id', function($query) use($user_id) {
                                          $query->select('proyectos.id')
                                          ->from('proyectos')
                                          ->where('proyectos.user_id', '=', $user_id);
                                      })
                                    ->where('proyecto_modulo.propietario', '=', 'asesor')
                                    ->delete();

        DB::table('proyectos_claves')
                                    ->whereIn('proyectos_claves.proyecto_id', function($query) use($user_id) {
                                          $query->select('proyectos.id')
                                          ->from('proyectos')
                                          ->where('proyectos.user_id', '=', $user_id);
                                      })
                                    ->where('proyectos_claves.propietario', '=', 'asesor')
                                    ->delete();

        DB::table('proyectos_parrafos')
                                    ->whereIn('proyectos_parrafos.proyecto_id', function($query) use($user_id) {
                                          $query->select('proyectos.id')
                                          ->from('proyectos')
                                          ->where('proyectos.user_id', '=', $user_id);
                                      })
                                    ->where('proyectos_parrafos.propietario', '=', 'asesor')
                                    ->delete();

        DB::table('proyectos_imagenes')
                                    ->whereIn('proyectos_imagenes.proyecto_id', function($query) use($user_id) {
                                          $query->select('proyectos.id')
                                          ->from('proyectos')
                                          ->where('proyectos.user_id', '=', $user_id);
                                      })
                                    ->where('proyectos_imagenes.propietario', '=', 'asesor')
                                    ->delete();
    }


}


/*
DELETE FROM hola WHERE user_id=2 AND copia='admin'
USER_MODULO
User_Clave
USER_PARRAFO
USER_IMAGEN

PROYECTO_MODULO
PROYECTO_CLAVES
PROYECTO_PARRAFOS
PROYECTO_IMAGENES


INSERT INTO hola(user_id,clave_id,valor,copia)
    SELECT user_id,clave_id,valor, 'admin' as copia
    FROM hola
    WHERE user_id=2 AND copia='asesor'
*/

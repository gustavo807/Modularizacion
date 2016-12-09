<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Doc_Usuario extends Model
{
    //use SoftDeletes;

    protected $table = 'doc_usuarios';
    public $fillable = ['user_id','documento_id','documento'];
    //protected $dates = ['deleted_at'];

    public function setDocumentoAttribute($documento){
      	if(! empty($documento)){
  			$name = Carbon::now()->second.$documento->getClientOriginalName();
  			$this->attributes['documento'] = $name;
  			\Storage::disk('local')->put($name, \File::get($documento));
      	}
  	}

    public static function consulta($id){
    	return DB::table('documentos')
                      ->join('categorias','documentos.categoria_id','=','categorias.id')
                      ->select('documentos.*','categorias.categoria',
                      DB::raw('(SELECT doc_usuarios.documento FROM doc_usuarios
                                  WHERE doc_usuarios.user_id = '.$id.' AND
                                  documentos.id = doc_usuarios.documento_id) as documento') )

                      //->whereNull('documentos.deleted_at')
                      ->where('documentos.rol_id','=','1')
                      ->orderBy('categorias.categoria', 'asc')
                      ->orderBy('documentos.nombre', 'asc')
                      ->paginate(10);
    }

    public static function existedocumento($user_id, $documento_id){
      return DB::table('doc_usuarios')
                ->select('doc_usuarios.*')
                ->where('user_id','=', $user_id)
                ->where('documento_id','=', $documento_id)
                ->first();
    }

    public static function borradocumento($user_id, $documento_id){
      return DB::table('doc_usuarios')
                //->select('doc_usuarios.*')
                ->where('user_id','=', $user_id)
                ->where('documento_id','=', $documento_id)
                ->delete();
    }


}




/*
SELECT documentos.id,documentos.rol_id,documentos.nombre,categorias.categoria,
(SELECT doc_usuarios.documento
 FROM doc_usuarios
 WHERE doc_usuarios.user_id=3 AND documentos.id=doc_usuarios.documento_id) as documento
FROM documentos JOIN categorias ON documentos.categoria_id=categorias.id
WHERE documentos.deleted_at is null and rol_id=1
*/

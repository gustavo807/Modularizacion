<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Doc_Usuario extends Model
{

    protected $table = 'doc_usuarios';
    public $fillable = ['user_id','documento_id','documento'];

    // Agrega al nombre del documento el segundo en el que fue agregado
    public function setDocumentoAttribute($documento)
    {
      	if(! empty($documento)){
  			$name = Carbon::now()->second.$documento->getClientOriginalName();
  			$this->attributes['documento'] = $name;
  			\Storage::disk('local')->put($name, \File::get($documento));
      	}
  	}

    // Obtiene los documentos de un usuario en especifico
    public static function consulta($id)
    {
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

    // Obtiene el un documento de un usuario
    public static function existedocumento($user_id, $documento_id)
    {
      return DB::table('doc_usuarios')
                ->select('doc_usuarios.*')
                ->where('user_id','=', $user_id)
                ->where('documento_id','=', $documento_id)
                ->first();
    }

    // Elemina un documento
    public static function borradocumento($user_id, $documento_id)
    {
      return DB::table('doc_usuarios')
                //->select('doc_usuarios.*')
                ->where('user_id','=', $user_id)
                ->where('documento_id','=', $documento_id)
                ->delete();
    }


}

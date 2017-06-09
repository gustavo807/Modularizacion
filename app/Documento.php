<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Datatables;

class Documento extends Model
{
    protected $table = 'documentos';
    public $fillable = ['nombre','rol_id','categoria_id'];

    // Obtiene los documentos para mostralos con la libreria DataTable
    public static function apidocumentos()
    {
      return Datatables::queryBuilder(
            DB::table('documentos')
                      ->select('documentos.*', 
                          DB::raw('(SELECT categorias.categoria
                                 FROM categorias
                                  WHERE categorias.id=documentos.categoria_id) as categoria'),
                          DB::raw('(SELECT roles.rol
                                 FROM roles
                                  WHERE roles.id=documentos.rol_id) as rol')
                        )
            )->make(true);
    }
}

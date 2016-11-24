<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Documento;
use App\Rol;
use App\Categoria;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $documentos = DB::table('documentos')
                      ->join('roles', 'documentos.rol_id', '=', 'roles.id')
                      ->join('categorias','documentos.categoria_id','=','categorias.id')
                      ->select('documentos.*', 'roles.rol','categorias.categoria')
                      ->whereNull('documentos.deleted_at')
                      ->orderBy('documentos.nombre', 'asc')
                      ->get();
        return view('asesor/documento.index',['documentos' => $documentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Rol::pluck('rol','id');
      $categorias = Categoria::pluck('categoria','id');
      return view('asesor/documento.create',['roles' => $roles,'categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'nombre' => 'required',
          'rol_id' => 'required',
      ]);
      Documento::create($request->all());
      return redirect('/asesordocumentos')->with('success','Documento registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $documento = Documento::find($id);
      $roles = Rol::pluck('rol','id');
      $categorias = Categoria::pluck('categoria','id');
      return view('asesor/documento.edit',['documento' => $documento, 'roles' => $roles, 'categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'nombre' => 'required',
          'rol_id' => 'required',
      ]);
      Documento::find($id)->update($request->all());
      return redirect('/asesordocumentos')->with('success','Documento actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Documento::find($id)->delete();
      return redirect('/asesordocumentos')->with('success','Documento borrado correctamente');
    }
}
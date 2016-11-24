<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Doc_Usuario;
use App\Documento;
use App\Categoria;

class EmpresaDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->user()->id;
        $documentos = Doc_Usuario::consulta($id);
        return view('empresa/documento.index',['documentos'=>$documentos, 'userid'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->user()->id;
        $doc = Doc_Usuario::existedocumento($id, $request->documento_id);
        $variable;
        if(count($doc) == 0){
            Doc_Usuario::create($request->all());
            $variable = 'Registrado';
          }
        else {
          Doc_Usuario::borradocumento($id, $request->documento_id);
          Doc_Usuario::create($request->all());
          $variable = 'Actualizado';
        }

        return redirect('/empresadocumentos')->with('success','Documento '.$variable.' correctamente');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userid = Auth::user()->id;
        Doc_Usuario::borradocumento($userid, $id);
        return redirect('/empresadocumentos')->with('success','Documento borrado correctamente');
    }
}

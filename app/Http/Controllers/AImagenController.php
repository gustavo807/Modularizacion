<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;
use App\Modulo;

class AImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagenes = Imagen::modulos();
        return view('asesor/imagen.index',['imagenes'=>$imagenes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $modulos = Modulo::pluck('modulo','id');
      return view('asesor/imagen.create',['modulos'=>$modulos]);
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
          'descripcion' => 'required',
          'referencia' => 'required',
          'modulo_id' => 'required',
          'imagen' => 'required',
      ]);
      Imagen::create($request->all());

      return redirect('/asesorimagen')->with('success','Imagen registrada correctamente');
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
      $imagen = Imagen::find($id);
      $modulos = Modulo::pluck('modulo','id');
      return view('asesor/imagen.edit',['imagen'=>$imagen,'modulos'=>$modulos]);
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
          'descripcion' => 'required',
          'referencia' => 'required',
          'modulo_id' => 'required',
          'imagen' => 'required',
      ]);
      Imagen::find($id)->update($request->all());

      return redirect('/asesorimagen')->with('success','Imagen actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Imagen::find($id)->delete();
      return redirect('/asesorimagen')->with('success','Imagen borrada correctamente');
    }
}

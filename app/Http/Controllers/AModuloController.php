<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modulo;
use App\Clasificacion;
class AModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modulos = Modulo::clasificaciones();
        return view('asesor/modulo.index',['modulos'=>$modulos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $clasificaciones = Clasificacion::pluck('clasificacion','id');
      return view('asesor/modulo.create',['clasificaciones'=>$clasificaciones]);
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
          'modulo' => 'required',
          'clasificacion_id' => 'required',
      ]);
      Modulo::create($request->all());

      return redirect('/asesormodulo')->with('success','Modulo registrado correctamente');
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
      $modulo = Modulo::findOrFail($id);
      $clasificaciones = Clasificacion::pluck('clasificacion','id');
      return view('asesor/modulo.edit',['modulo'=>$modulo, 'clasificaciones'=>$clasificaciones]);
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
          'modulo' => 'required',
          'clasificacion_id' => 'required',
      ]);
      Modulo::find($id)->update($request->all());
      return redirect('/asesormodulo')->with('success','Modulo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Modulo::find($id)->delete();
      return redirect('/asesormodulo')->with('success','Modulo borrado correctamente');
    }
}

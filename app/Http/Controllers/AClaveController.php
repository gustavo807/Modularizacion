<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clave;
use App\Modulo;
class AClaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $claves = Clave::modulos();
        return view('asesor/clave.index',['claves'=>$claves]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $modulos = Modulo::pluck('modulo','id');
      return view('asesor/clave.create',['modulos'=>$modulos]);
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
          'identificador' => 'required',
          'modulo_id' => 'required',
      ]);
      Clave::create($request->all());

      return redirect('/asesorclave')->with('success','Clave registrada correctamente');
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
      $clave = Clave::findOrFail($id);
      $modulos = Modulo::pluck('modulo','id');
      return view('asesor/clave.edit',['clave'=>$clave,'modulos'=>$modulos]);
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
          'identificador' => 'required',
          'modulo_id' => 'required',
      ]);
      Clave::find($id)->update($request->all());
      return redirect('/asesorclave')->with('success','Clave actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Clave::find($id)->delete();
      return redirect('/asesorclave')->with('success','Clave borrada correctamente');
    }
}

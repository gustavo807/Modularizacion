<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clasificacion;
class AClasificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clasificaciones = Clasificacion::all();
        return view('asesor/clasificacion.index',['clasificaciones'=>$clasificaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asesor/clasificacion.create');
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
          'clasificacion' => 'required',
      ]);
      clasificacion::create([ 'clasificacion' => $request['clasificacion'], ]);

      return redirect('/asesorclasificacion')->with('success','clasificacion registrado correctamente');
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
      $clasificacion = Clasificacion::findOrFail($id);
      return view('asesor/clasificacion.edit',['clasificacion'=>$clasificacion]);
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
          'clasificacion' => 'required',
      ]);
      clasificacion::find($id)->update($request->all());

      return redirect('/asesorclasificacion')->with('success','Clasificacion actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Clasificacion::find($id)->delete();
      return redirect('/asesorclasificacion')
                      ->with('success','Clasificacion borrada correctamente');
    }
}

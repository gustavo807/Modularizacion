<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Convocatoria;
use App\Proyecto;
use Session;

class AProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $convocatorias = Convocatoria::pluck('convocatoria','id');
        return view('asesor.proyecto.create',['convocatorias'=>$convocatorias]);
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
          'descripcion' => 'required',
          'convocatoria_id' => 'required',
      ]);
      $idempresa = Session::get('idempresa');

      if (isset($idempresa)) {
        Proyecto::create([
          'convocatoria_id' => $request['convocatoria_id'],
          'user_id' => $idempresa,
          'nombre' => $request['nombre'],
          'descripcion' => $request['descripcion'],
        ]);

        return redirect('/asesorempresa/'.$idempresa)->with('success','Proyecto registrado correctamente');
      }

      //return Session::get('idempresa');
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
      $convocatorias = Convocatoria::pluck('convocatoria','id');
      $proyecto = Proyecto::findOrFail($id);
      return view('asesor.proyecto.edit',['convocatorias'=>$convocatorias,'proyecto'=>$proyecto]);
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
          'descripcion' => 'required',
          'convocatoria_id' => 'required',
      ]);
      $idempresa = Session::get('idempresa');

      if (isset($idempresa)) {
        Proyecto::find($id)->update([
          'convocatoria_id' => $request['convocatoria_id'],
          'user_id' => $idempresa,
          'nombre' => $request['nombre'],
          'descripcion' => $request['descripcion'],
        ]);

        return redirect('/asesorempresa/'.$idempresa)->with('success','Proyecto actualizado correctamente');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idempresa = Session::get('idempresa');

        if (isset($idempresa)) {
          Proyecto::find($id)->delete();
          return redirect('/asesorempresa/'.$idempresa)->with('success','Proyecto actualizado correctamente');
        }
    }
}

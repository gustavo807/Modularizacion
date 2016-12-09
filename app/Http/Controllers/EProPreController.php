<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto_Clave;
use App\Proyecto_Parrafo;
use App\Proyecto;
use Session;

class EProPreController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $iduser = $request->user()->id;
        $proyecto = Proyecto::findOrFail($id);

        if($proyecto->user_id != $iduser)
          return redirect('/empresa');

        //$idproyecto = Session::get('idproyecto');
        $claves = Proyecto_Clave::claves($id, 'empresa');
        //return $claves;
        return view('empresa.infoproyecto.index',['claves'=>$claves,'idproyecto'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
      $iduser = $request->user()->id;
      $proyecto = Proyecto::findOrFail($id);

      if($proyecto->user_id != $iduser)
        return redirect('/empresa');

      $parrafos = Proyecto_Parrafo::parrafosproyecto($id, 'empresa', '2');
      $claves = Proyecto_Clave::claves($id, 'empresa');
      //return $claves;
      return view('empresa.infoproyecto.parrafos',['parrafos'=>$parrafos,'claves'=>$claves,'idproyecto'=>$id]);
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
        //
    }
}

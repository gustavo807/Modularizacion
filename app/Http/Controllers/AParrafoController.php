<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Parrafo;
use App\Modulo;
class AParrafoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rol_id != 3) return redirect('/asesor');

        $parrafos = Parrafo::modulos();
        return view('asesor/parrafo.index',['parrafos'=>$parrafos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (Auth::user()->rol_id != 3) return redirect('/asesor');

      $modulos = Modulo::pluck('modulo','id');
      return view('asesor/parrafo.create',['modulos'=>$modulos]);
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
          'parrafo' => 'required|max:2000',
          'modulo_id' => 'required|max:255',
      ]);
      Parrafo::create($request->all());

      return redirect('/asesorparrafo')->with('success','Parrafo registrado correctamente');
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
      if (Auth::user()->rol_id != 3) return redirect('/asesor');
      
      $parrafo = Parrafo::findOrFail($id);
      $modulos = Modulo::pluck('modulo','id');
      return view('asesor/parrafo.edit',['parrafo'=>$parrafo,'modulos'=>$modulos]);
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
          'parrafo' => 'required|max:2000',
          'modulo_id' => 'required|max:255',
      ]);
      Parrafo::find($id)->update($request->all());
      return redirect('/asesorparrafo')->with('success','Parrafo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Parrafo::find($id)->delete();
      return redirect('/asesorparrafo')->with('success','Parrafo borrado correctamente');
    }
}

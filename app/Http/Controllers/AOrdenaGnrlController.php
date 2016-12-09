<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ordena_Modulo;
use App\Modulo;

class AOrdenaGnrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clasificacion_id = '1';
        $modulos = Ordena_Modulo::ordenmodulos($clasificacion_id);
        return view('asesor.ordenagnrl.index',['modulos'=>$modulos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $clasificacion_id = '2';
      $modulos = Ordena_Modulo::ordenmodulos($clasificacion_id);
      return view('asesor.ordenagnrl.index',['modulos'=>$modulos]);
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
          'orden' => 'required|unique:ordena_modulos',
      ]);
      Ordena_Modulo::create([
        'modulo_id' => $request['modulo_id'],
        'orden' => $request['orden'],
      ]);

      $clasificacion = Ordena_Modulo::gnrlconv($request['modulo_id']);
      if($clasificacion->clasificacion_id == 1)
        return redirect('/aordenagnrl')->with('success','Orden registrado correctamente');
      else
        return redirect('/aordenagnrl/create')->with('success','Orden registrado correctamente');

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
        $orden = Ordena_Modulo::all()->where('modulo_id','=',$id)->first();
        if(count($orden) == 0)
          return view('asesor.ordenagnrl.create',['modulo'=>$modulo]);
        else
          return view('asesor.ordenagnrl.edit',['modulo'=>$modulo,'orden'=>$orden]);
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
          'orden' => 'required|unique:ordena_modulos',
      ]);
      Ordena_Modulo::actualiza($id,$request['orden']);

      $clasificacion = Ordena_Modulo::gnrlconv($id);
      if($clasificacion->clasificacion_id == 1)
        return redirect('/aordenagnrl')->with('success','Orden actualizada correctamente');
      else
        return redirect('/aordenagnrl/create')->with('success','Orden actualizada correctamente');

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

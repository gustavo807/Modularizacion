<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modulo;
use App\Clasificacion;
class AModuloController extends Controller
{
    public function index()
    {
        if (Auth::user()->rol_id != 3) return redirect('/asesor');

        //$modulos = Modulo::clasificaciones();
        return view('asesor/modulo.index');
    }

    public function create()
    {
      if (Auth::user()->rol_id != 3) return redirect('/asesor');

      $clasificaciones = Clasificacion::pluck('clasificacion','id');
      return view('asesor/modulo.create',['clasificaciones'=>$clasificaciones]);
    }

    public function store(Request $request)
    {
      $this->validate($request, [
          'modulo' => 'required|max:255',
          'descripcion' => 'max:1000',
          'clasificacion_id' => 'required|max:255',
      ]);
      Modulo::create($request->all());

      return redirect('/asesormodulo')->with('success','Modulo registrado correctamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      if (Auth::user()->rol_id != 3) return redirect('/asesor');

      $modulo = Modulo::findOrFail($id);
      $clasificaciones = Clasificacion::pluck('clasificacion','id');
      return view('asesor/modulo.edit',['modulo'=>$modulo, 'clasificaciones'=>$clasificaciones]);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'modulo' => 'required|max:255',
          'descripcion' => 'max:1000',
          'clasificacion_id' => 'required|max:255',
      ]);
      Modulo::find($id)->update($request->all());
      return redirect('/asesormodulo')->with('success','Modulo actualizado correctamente');
    }

    public function destroy($id)
    {
      Modulo::find($id)->delete();
      return redirect('/asesormodulo')->with('success','Modulo borrado correctamente');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Clasificacion;
class AClasificacionController extends Controller
{
    public function index()
    {
        if (Auth::user()->rol_id != 3) return redirect('/asesor');

        $clasificaciones = Clasificacion::all();
        return view('asesor/clasificacion.index',['clasificaciones'=>$clasificaciones]);
    }

    public function create()
    {
        if (Auth::user()->rol_id != 3) return redirect('/asesor');

        return view('asesor/clasificacion.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
          'clasificacion' => 'required|max:255',
      ]);
      clasificacion::create([ 'clasificacion' => $request['clasificacion'], ]);

      return redirect('/asesorclasificacion')->with('success','clasificacion registrado correctamente');
    }


    public function edit($id)
    {
      if (Auth::user()->rol_id != 3) return redirect('/asesor');

      $clasificacion = Clasificacion::findOrFail($id);
      return view('asesor/clasificacion.edit',['clasificacion'=>$clasificacion]);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'clasificacion' => 'required|max:255',
      ]);
      clasificacion::find($id)->update($request->all());

      return redirect('/asesorclasificacion')->with('success','Clasificacion actualizado correctamente');
    }

    public function destroy($id)
    {
      Clasificacion::find($id)->delete();
      return redirect('/asesorclasificacion')
                      ->with('success','Clasificacion borrada correctamente');
    }
}

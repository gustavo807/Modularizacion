<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Clasificacion;
class AClasificacionController extends Controller
{
    // Funcion principal que nos redirige al index y muestra las clasificaciones
    public function index()
    {
        if (Auth::user()->rol_id != 3) 
          return redirect('/asesor');

        $clasificaciones = Clasificacion::all();
        return view('asesor/clasificacion.index',['clasificaciones'=>$clasificaciones]);
    }

    // Funcion para crear una clasificacion
    public function create()
    {
        if (Auth::user()->rol_id != 3) 
          return redirect('/asesor');

        return view('asesor/clasificacion.create');
    }

    // Funcion para guardar los datos del formulario
    public function store(Request $request)
    {
      $this->validate($request, [
          'clasificacion' => 'required|max:255',
      ]);

      clasificacion::create([ 'clasificacion' => $request['clasificacion'], ]);

      return redirect('/asesorclasificacion')->with('success','clasificacion registrado correctamente');
    }

    // Funcion para editar un registro con su vista
    public function edit($id)
    {
      if (Auth::user()->rol_id != 3) 
        return redirect('/asesor');

      $clasificacion = Clasificacion::findOrFail($id);
      return view('asesor/clasificacion.edit',['clasificacion'=>$clasificacion]);
    }

    // Funcion para actulizar los cambios del formulario
    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'clasificacion' => 'required|max:255',
      ]);

      clasificacion::find($id)->update($request->all());

      return redirect('/asesorclasificacion')->with('success','Clasificacion actualizado correctamente');
    }

    // Funcion para borrar un registro
    public function destroy($id)
    {
      Clasificacion::find($id)->delete();
      return redirect('/asesorclasificacion')
                      ->with('success','Clasificacion borrada correctamente');
    }
}

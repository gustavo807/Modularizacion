<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Clave;
use App\Modulo;
class AClaveController extends Controller
{
    // Muestra la pagina de inicio para las claves
    public function index()
    {
        if (Auth::user()->rol_id != 3) 
          return redirect('/asesor');

        return view('asesor/clave.index');
    }

    // Muestra la pagina para crear un nuevo registro
    public function create()
    {
      if (Auth::user()->rol_id != 3) 
        return redirect('/asesor');

      $modulos = Modulo::pluck('modulo','id');
      return view('asesor/clave.create',['modulos'=>$modulos]);
    }

    //Guarda los datos del formulario
    public function store(Request $request)
    {
      $this->validate($request, [
          'nombre' => 'required|max:255',
          'identificador' => 'required|max:255',
          'modulo_id' => 'required|max:255',
      ]);

      Clave::create($request->all());

      return redirect('/asesorclave')->with('success','Clave registrada correctamente');
    }

    // Esta funcion no se utiliza por eso el 404
    public function show($id)
    {
        abort(404);
    }

    //Show the form for editing the specified resource.     
    public function edit($id)
    {
      if (Auth::user()->rol_id != 3) return redirect('/asesor');

      $clave = Clave::findOrFail($id);
      $modulos = Modulo::pluck('modulo','id');
      return view('asesor/clave.edit',['clave'=>$clave,'modulos'=>$modulos]);
    }

    
     // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'nombre' => 'required|max:255',
          'identificador' => 'required|max:255',
          'modulo_id' => 'required|max:255',
      ]);

      Clave::find($id)->update($request->all());

      return redirect('/asesorclave')->with('success','Clave actualizada correctamente');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
      Clave::find($id)->delete();
      return redirect('/asesorclave')->with('success','Clave borrada correctamente');
    }
}

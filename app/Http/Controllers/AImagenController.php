<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imagen;
use App\Modulo;

class AImagenController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        if (Auth::user()->rol_id != 3) 
          return redirect('/asesor');

        return view('asesor/imagen.index');
    }

    // Show the form for creating a new resource.
    public function create()
    {
      if (Auth::user()->rol_id != 3) return redirect('/asesor');

      $modulos = Modulo::pluck('modulo','id');
      return view('asesor/imagen.create',['modulos'=>$modulos]);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
      $this->validate($request, [
          'descripcion' => 'required|max:2000',
          'referencia' => 'required|max:2000',
          'modulo_id' => 'required|max:255',
          'imagen' => 'required',
      ]);
      Imagen::create($request->all());

      return redirect('/asesorimagen')->with('success','Imagen registrada correctamente');
    }

    
    // Display the specified resource.
    public function show($id)
    {
        abort(404);
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
      if (Auth::user()->rol_id != 3) 
        return redirect('/asesor');
      
      $imagen = Imagen::findOrFail($id);
      $modulos = Modulo::pluck('modulo','id');
      return view('asesor/imagen.edit',['imagen'=>$imagen,'modulos'=>$modulos]);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'descripcion' => 'required|max:2000',
          'referencia' => 'required|max:2000',
          'modulo_id' => 'required|max:255',
          'imagen' => 'required',
      ]);
      Imagen::find($id)->update($request->all());

      return redirect('/asesorimagen')->with('success','Imagen actualizada correctamente');
    }
    
    // Remove the specified resource from storage.
    public function destroy($id)
    {
      Imagen::find($id)->delete();
      return redirect('/asesorimagen')->with('success','Imagen borrada correctamente');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Categoria;

class ACategoriaController extends Controller
{
    // Desplegar vista de categorias
    public function index()
    {
        if (Auth::user()->rol_id != 3) 
            return redirect('/asesor');

        return view('asesor/categoria.index');
    }

    // Crear una categora
    public function create()
    {
        if (Auth::user()->rol_id != 3) 
            return redirect('/asesor');

        return view('asesor/categoria.create');
    }

    // Funcion para guardar
    public function store(Request $request)
    {
      $this->validate($request, [
          'categoria' => 'required|max:255',
      ]);
      Categoria::create($request->all());
      return redirect('/asesorcategoria')->with('success','Categoria registrada correctamente');
    }

    // Funcion para editar una categoria
    public function edit($id)
    {
        if (Auth::user()->rol_id != 3) 
            return redirect('/asesor');

        $categoria = Categoria::findOrFail($id);
        return view('asesor/categoria.edit',['categoria'=>$categoria]);
    }

    // Funcion para actualizar los cambios
    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'categoria' => 'required|max:255',
      ]);
      Categoria::find($id)->update($request->all());
      return redirect('/asesorcategoria')->with('success','Categoria actualizada correctamente');
    }

    // Funcion para borrar una categoria
    public function destroy($id)
    {
      Categoria::find($id)->delete();
      return redirect('/asesorcategoria')->with('success','Categoria borrada correctamente');
    }
}

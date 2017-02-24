<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dirigido;

class DirigidoController extends Controller
{
    
    public function index()
    {
        $datos = Dirigido::paginate(10);
        return view('asesor.dirigidoa.index',compact('datos'));
    }

    public function create()
    {
        return view('asesor.dirigidoa.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['nombre'=>'required|max:255']);
        Dirigido::create(['nombre'=>$request->nombre]);
        return redirect('/dirigidoa')->with('success','Nombre agregado correctamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $dato = Dirigido::findOrFail($id);
        return view('asesor.dirigidoa.edit',compact('dato'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, ['nombre'=>'required|max:255']);
        Dirigido::findOrFail($id)->update(['nombre'=>$request->nombre]);
        return redirect('/dirigidoa')->with('success','Nombre actualizado correctamente');
    }

    public function destroy($id)
    {
        //
    }
}

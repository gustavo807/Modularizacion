<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partida;

class CotizacionController extends Controller
{

    public function index(Request $request)
    {
        $s = $request->user()->sede;
        $partidas = Partida::where('sede_id', $s->id)->paginate(10);
        return view('vinculado.cotizaciones.index', compact('partidas'));
    }

    public function create()
    {
        return view('vinculado.cotizaciones.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'descripcion' => 'required|max:6000',
            'precio' => 'required|max:255',
            'cambio' => 'required|max:255'
        ]);

        $s = $request->user()->sede;     
        if($s->id != $request->sede_id) abort(404);

        Partida::create($request->all());

        return redirect('cotizaciones')->with('success','Registro creado correctamente');
    }

    public function show($id)
    {
        abort(404);
    }

    public function edit($id)
    {
        $c = Partida::findOrFail($id);
        return view('vinculado.cotizaciones.edit',compact('c'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'descripcion' => 'required|max:6000',
            'precio' => 'required|max:255',
            'cambio' => 'required|max:255'
        ]);

        $s = $request->user()->sede;
        $c = Partida::findOrFail($id);
        if($s->id != $c->sede_id) abort(404);

        $c->update($request->intersect([
            'descripcion',
            'precio',
            'cambio'
        ]));

        return redirect('cotizaciones')->with('success','Registro actualizado correctamente');
    }

    public function destroy($id)
    {
        abort(404);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PartidaRequest;
use App\Partida;
use App\Sede;

class PartidaController extends Controller
{
    
    public function index()
    {
        return view('asesor.partidas.index');
    }

    public function create()
    {
        $s = Sede::sedes()->pluck('nombre','id');
        return view('asesor.partidas.create',compact('s'));
    }

    public function store(PartidaRequest $request)
    {
        Partida::valida($request->cambio,$request->sede_id);
        Partida::create($request->all());
        return redirect('partidas')->with('success','Partida registrada correctamente');
    }

    public function show($id)
    {
        abort(404);
    }

    public function edit($id)
    {
        $p = Partida::findOrFail($id);
        $s = Sede::sedes()->pluck('nombre','id');
        return view('asesor.partidas.edit',compact('p','s'));
    }

    public function update(PartidaRequest $request, $id)
    {   
        Partida::valida($request->cambio,$request->sede_id);
        Partida::findOrFail($id)->update($request->all());
        return redirect('partidas')->with('success','Partida actualizada correctamente');
    }

    public function destroy($id)
    {
        abort(404);
    }
}

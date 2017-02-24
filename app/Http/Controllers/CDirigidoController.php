<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Convocatoria;
use App\Dirigido;

class CDirigidoController extends Controller
{
    public function index()
    {
        abort(404);
    }

    public function create(Request $request)
    {
        abort(404);
    }

    public function crear($id)
    {
        $convocatoria = Convocatoria::findOrFail($id);
        $opciones = Dirigido::pluck('nombre','id');
        return view('asesor.cdirigido.create',compact('opciones','convocatoria'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['nombre'=>'required|max:255']);
        $nombre = Dirigido::findOrFail($request->nombre);
        $convocatoria = Convocatoria::findOrFail($request->convocatoria);

        $convocatoria->dirigidos()->syncWithoutDetaching([$nombre->id]);
        return redirect('asesorconvocatoria/a/dirigido/'.$convocatoria->id)->with('success','Nombre Agregado correctamente');
    }

    public function show($id)
    {
        $convocatoria = Convocatoria::findOrFail($id);
        return view('asesor.cdirigido.index',compact('convocatoria'));
    }

    public function edit($id)
    {
        abort(404);
    }

    public function editar($idc, $idr)
    {
        $convocatoria = Convocatoria::findOrFail($idc);
        $nombre = Dirigido::findOrFail($idr);
        $opciones = Dirigido::pluck('nombre','id');
        return view('asesor.cdirigido.edit',compact('opciones','convocatoria','nombre'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, ['nombre'=>'required|max:255']);
        $nombre = Dirigido::findOrFail($request->nombre);
        $convocatoria = Convocatoria::findOrFail($request->convocatoria);

        $convocatoria->dirigidos()->toggle([$id]);
        $convocatoria->dirigidos()->syncWithoutDetaching([$nombre->id]);

        return redirect('asesorconvocatoria/a/dirigido/'.$convocatoria->id)->with('success','Nombre Actualizado correctamente');
    }


    public function destroy($id)
    {
        abort(404);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResearcherRequest;
use App\Researcher;
use App\Sede;

class ResearcherController extends Controller
{
    
    public function index()
    {
        return view('asesor.researchers.index');
    }

    public function create()
    {
        $s = Sede::sedes()->pluck('nombre','id');
        $g = Researcher::grados();
        $c = Researcher::campos();
        $sni = Researcher::sni();
        return view('asesor.researchers.create',compact('s','g','c','sni'));
    }

    public function store(ResearcherRequest $request)
    {
        Researcher::valida(
            $request->grado,
            $request->campo,
            $request->sni,
            $request->sexo,
            $request->sede_id
        );

        Researcher::create($request->all());
        return redirect('investigadores')->with('success','Registro insertado correctamente');
    }

    public function show($id)
    {
        abort(404);
    }

    public function edit($id)
    {
        $r = Researcher::findOrFail($id);
        $s = Sede::sedes()->pluck('nombre','id');
        $g = Researcher::grados();
        $c = Researcher::campos();
        $sni = Researcher::sni();
        return view('asesor.researchers.edit',compact('r','s','g','c','sni'));
    }

    public function update(ResearcherRequest $request, $id)
    {
        Researcher::valida(
            $request->grado,
            $request->campo,
            $request->sni,
            $request->sexo,
            $request->sede_id
        );

        Researcher::findOrFail($id)->update($request->all());
        return redirect('investigadores')->with('success','Registro actualizado correctamente');
    }

    public function destroy($id)
    {
        abort(404);
    }
}

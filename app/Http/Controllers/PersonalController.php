<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResearcherRequest;
use App\Researcher;

class PersonalController extends Controller
{

    public function index(Request $request)
    {
        $s = $request->user()->sede;
        $investigadores = Researcher::where('sede_id',$s->id)->paginate(10);
        return view('vinculado.personal.index', compact('investigadores'));
    }

    public function create()
    {
        $g = Researcher::grados();
        $c = Researcher::campos();
        $sni = Researcher::sni();
        return view('vinculado.personal.create',compact('g','c','sni'));
    }

    public function store(ResearcherRequest $request)
    {
        $s = $request->user()->sede;     
        if($s->id != $request->sede_id) abort(404);

        Researcher::valida(
            $request->grado,
            $request->campo,
            $request->sni,
            $request->sexo,
            $s->id
        );

        Researcher::create($request->all());

        return redirect('personal')->with('success','Registro creado correctamente');
    }

    public function show($id)
    {
        abort(404);
    }

    public function edit(Request $request, $id)
    {
        $s = $request->user()->sede;        
        $r = Researcher::findOrFail($id);
        if($s->id != $r->sede_id) abort(404);        
        $g = Researcher::grados();
        $c = Researcher::campos();
        $sni = Researcher::sni();
        return view('vinculado.personal.edit',compact('r','g','c','sni'));
    }

    public function update(ResearcherRequest $request, $id)
    {
        $s = $request->user()->sede;        
        $r = Researcher::findOrFail($id);
        if($s->id != $r->sede_id) abort(404);

        Researcher::valida(
            $request->grado,
            $request->campo,
            $request->sni,
            $request->sexo,
            $s->id
        );

        $r->update($request->intersect([
            'nombre','apellidopaterno',
            'apellidomaterno','sexo',
            'usuarioconacyt','correo',
            'telefono','grado','campo',
            'sni','informacion',
            'actividades','entregables'
        ]));

        return redirect('personal')->with('success','Registro actualizado correctamente');
    }

    public function destroy($id)
    {
        abort(404);
    }
}

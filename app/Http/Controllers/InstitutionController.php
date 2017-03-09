<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InstitucionRequest;
use App\Http\Requests\InstitucionUpdateRequest;
use App\Institution;

class InstitutionController extends Controller
{

    public function index()
    {
        return view('asesor.instituciones.index');
    }

    public function create()
    {
        return view('asesor.instituciones.create');
    }

    public function store(InstitucionRequest $request)
    {
        Institution::create($request->all());
        return redirect('instituciones')->with('success','Institución registrada con exito');
    }

    public function show($id)
    {
        abort(404);
    }

    public function edit($id)
    {
        $i = Institution::findOrFail($id);
        return view('asesor.instituciones.edit',compact('i'));
    }

    public function update(InstitucionUpdateRequest $request, $id)
    {
        $i = Institution::findOrFail($id);
        if(! empty($request->logo)) \Storage::delete($i->logo);
        $i->update($request->all());
        return redirect('instituciones')->with('success','Institución actualizada con exito');
    }

    public function destroy($id)
    {
        abort(404);
    }
}

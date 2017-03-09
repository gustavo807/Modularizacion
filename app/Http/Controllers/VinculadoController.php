<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vinculado;
use App\Proyecto;
use App\User_Clave;
use App\Proyecto_Clave;
use App\User;

class VinculadoController extends Controller
{

    public function index(Request $request)
    {   
        $sede = $request->user()->sede;     
        $proyectos = Proyecto::sede_proyectos($sede->id);
        return view('vinculado.proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        abort(404);
    }

    public function store(Request $request)
    {
        abort(404);
    }

    public function show(Request $request, $id)
    {
        $p = Proyecto::findOrFail($id);
        $s = $request->user()->sede;
        $a = $s->proyectos->pluck('id');
        if(! $a->contains($p->id) ) abort('404');

        return view('vinculado.proyectos.show',compact('p'));
    }

    public function edit(Request $request, $id)
    {
        $p = Proyecto::findOrFail($id);
        $s = $request->user()->sede;
        $a = $s->proyectos->pluck('id');
        if(! $a->contains($p->id) ) abort('404');

        $investigadores = $s->investigadores->pluck('nombre','id');
        return view('vinculado.proyectos.edit',compact('p','investigadores'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'investigador' => 'required|max:255'
        ]);
        $p = Proyecto::findOrFail($id);
        $s = $request->user()->sede;
        $a = $s->proyectos->pluck('id');
        if(! $a->contains($p->id) ) abort('404');

        $investigadores = $s->investigadores->pluck('id');
        if(! $investigadores->contains($request->investigador) ) abort('403');

        $p->investigadores()->syncWithoutDetaching([$request->investigador]); 
        return redirect('proyectos/'.$p->id)->with('success','Registro agregado correctamente');      
    }

    public function destroy($id)
    {
        abort(404);
    }

    public function clavesg(Request $request, $id, $proyecto_id)
    {
        $u = User::findOrFail($id);
        $p = Proyecto::findOrFail($proyecto_id);
        $sede_proyectos = $request->user()->sede->proyectos->pluck('id');
        $user_proyectos = $u->proyectos->pluck('id');

        //Si el proyecto no está asignado a la sede
        if(! $sede_proyectos->contains($p->id)) abort(404);

        //Si el usuario no es el propietario del proyecto
        if(! $user_proyectos->contains($p->id)) abort(404);
        

        $claves = User_Clave::claves($u->id,'empresa');
        return view('vinculado.claves.clavesg',compact('claves','p'));
    }

    public function clavesc(Request $request, $id)
    {
        $p = Proyecto::findOrFail($id);
        $sede_proyectos = $request->user()->sede->proyectos->pluck('id');

        //Si el proyecto no está asignado a la sede
        if(! $sede_proyectos->contains($p->id)) abort(404);

        $claves = Proyecto_Clave::claves($p->id,'empresa');
        return view('vinculado.claves.clavesc',compact('claves','p'));
    }

    public function parrafos($id)
    {

    }

}

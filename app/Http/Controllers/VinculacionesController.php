<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Proyecto;
use App\Sede;
use App\Partida;

class VinculacionesController extends Controller
{

    public function index()
    {
        abort(404);
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
        $proyecto = Proyecto::findOrFail($id);
        $user = $request->user();
        //Si es el propietario del proyecto
        if($proyecto->user_id != $user->id) abort(404);

        //return $proyecto->sedes;

        return view('empresa.vinculaciones.index', compact('proyecto'));
    }

    public function edit(Request $request, $id)
    {
        $sede = Sede::findOrFail($id);
        $user = $request->user();

        return $user->proyectos;
    }

    public function update(Request $request, $id)
    {
        abort(404);
    }

    public function destroy($id)
    {
        abort(404);
    }

    public function sede(Request $request, $proyecto_id, $sede_id)
    {
        $proyecto = Proyecto::findOrFail($proyecto_id);
        $user = $request->user();
        //Si es el propietario del proyecto
        if($proyecto->user_id != $user->id) abort(404);

        $a = $proyecto->sedes->pluck('id');
        //Si la sede no está asignada al proyecto
        if(! $a->contains($sede_id) ) abort(404);

        $sede = Sede::findOrFail($sede_id);
        $institution = $sede->institution;
        $check = $proyecto->partidas->pluck('id');
        $partidas = Partida::where('sede_id', $sede_id)->paginate(10);
        return view('empresa.vinculaciones.sede', compact('proyecto', 'sede', 'partidas','check', 'institution'));
    }

    public function partida(Request $request, $proyecto_id, $partida_id)
    {
        $proyecto = Proyecto::findOrFail($proyecto_id);
        $user = $request->user();
        //Si es el propietario del proyecto
        if($proyecto->user_id != $user->id) abort(404);

        $partida = Partida::findOrFail($partida_id);
        $a = $proyecto->sedes->pluck('id');
        //Si la partida no pertenece a las sedes asignadas al proyecto
        if(! $a->contains($partida->sede_id)) abort(404);

        //Si el valor es 0 o 1 
        if($request->value == 0 || $request->value == 1)
            $proyecto->partidas()->toggle([$partida->id]);
        else
            abort(404);        
    }

}

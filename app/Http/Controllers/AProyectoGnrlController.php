<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Modulo;
use App\Sede;
use App\Estado;
use App\Researcher;
use App\Partida;

class AProyectoGnrlController extends Controller
{
    
    public function index()
    {
        $modulos = Modulo::all()->where('clasificacion_id','2')->count();
        return view('asesor.proyectognrl.index',['modulos'=>$modulos]);
    }

    public function sedes($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('asesor.proyectognrl.sedes',compact('proyecto'));
    }

    public function createsede($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $s = Sede::sedes()->pluck('nombre','id');
        return view('asesor.proyectognrl.create',compact('proyecto','s'));
    }

    public function storesede(Request $request, $id)
    {
        $this->validate($request,['sede_id'=>'required|max:255']);
        $proyecto = Proyecto::findOrFail($id);
        Sede::findOrFail($request->sede_id);
        $proyecto->sedes()->syncWithoutDetaching([$request->sede_id]);
        return redirect('/aproyectosgnrl/sedes/'.$proyecto->id)->with('success','Sede registrada correctamente');
    }

    public function investigadores($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $investigadores = Researcher::proyecto_investigadores($proyecto->id);
        return view('asesor.proyectognrl.investigadores',compact('proyecto','investigadores'));
    }

    public function partidas($proyecto_id)
    {
        $proyecto = Proyecto::findOrFail($proyecto_id);
        $partidas = Partida::proyecto_partidas($proyecto->id);
        return view('asesor.proyectognrl.partidas', compact('proyecto', 'partidas'));
    }

    public function show($id)
    {
    	$proyecto = Proyecto::findOrFail($id);
        $estados = Estado::estados();
    	return view('asesor.proyectognrl.edit',compact('proyecto','estados'));
    }

    public function update(Request $request, $id)
    {
		$this->validate($request,[
    		'estado' => 'required|max:255',
    		'ciudad' => 'required|max:255'
    		]);
        Estado::findestado($request->estado);
    	$proyecto = Proyecto::findOrFail($id);
    	$proyecto->update($request->intersect([
    		'estado', 
    		'ciudad'
    	]));
    	return redirect('aproyectosgnrl')->with('success','Estado y ciudad registrados correctamente');
    }

    public function copyproyecto($id)
    {
        Proyecto::findOrFail($id);
        Proyecto::copyproyecto_borra($id);
        Proyecto::copyproyecto_crea($id);
        return redirect('/aproyectosgnrl')->with('success', 'Información copiada correctamente');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Institucion;
use App\Programa;
class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rol_id != 3) return redirect('/asesor');

        $instituciones = DB::table('instituciones')
                        ->join('programas', 'instituciones.programa_id', '=', 'programas.id')
                        ->select('instituciones.*', 'programas.programa')
                        ->whereNull('instituciones.deleted_at')
                        ->get();

        return view('asesor/institucion.index',['instituciones'=>$instituciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->rol_id != 3) return redirect('/asesor');

        $programas = Programa::pluck('programa','id');
        return view('asesor/institucion.create',compact('programas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'institucion' => 'required|max:255',
            'programa_id' => 'required|max:255',
        ]);
        Institucion::create($request->all());
        return redirect('/asesorinstitucion')->with('success','Institucion registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->rol_id != 3) return redirect('/asesor');
        
        $institucion = Institucion::findOrFail($id);
        $programa = Programa::pluck('programa','id');
        return view('asesor/institucion.edit',['institucion'=>$institucion,'programa'=>$programa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'institucion' => 'required|max:255',
            'programa_id' => 'required|max:255',
        ]);

        Institucion::find($id)->update($request->all());
        //$programa->update($request->all());
        return redirect('/asesorinstitucion')
                           ->with('success','Institucion actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Institucion::find($id)->delete();
        return redirect('/asesorinstitucion')
                        ->with('success','Institucion borrado correctamente');
    }
}

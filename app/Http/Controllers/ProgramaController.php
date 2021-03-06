<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Programa;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rol_id != 3) return redirect('/asesor');

         $programas = \App\Programa::all();
        return view('asesor/programa.index',compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->rol_id != 3) return redirect('/asesor');
        return view('asesor/programa.create');
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
            'programa' => 'required|max:255',
        ]);

        Programa::create([
            'programa' => $request['programa'],
        ]);

        return redirect('/asesorprograma')->with('success','Programa registrado correctamente');
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
    //public function edit (Programa $programa)
    public function edit ($id)
    {
        if (Auth::user()->rol_id != 3) return redirect('/asesor'); 
        $programa = Programa::findOrFail($id);
        return view('asesor/programa.edit',['programa'=>$programa]);
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
            'programa' => 'required|max:255',
        ]);

        Programa::find($id)->update($request->all());
        //$programa->update($request->all());
        return redirect('/asesorprograma')
                           ->with('success','Programa actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Programa::find($id)->delete();
        return redirect('/asesorprograma')
                        ->with('success','Programa borrado correctamente');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Convocatoria;
use App\Fondo;

class ConvocatoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rol_id != 3) return redirect('/asesor');

        $convocatorias = DB::table('convocatorias')
                        ->join('fondos', 'convocatorias.fondos_id', '=', 'fondos.id')
                        ->select('convocatorias.*', 'fondos.fondo')
                        ->whereNull('convocatorias.deleted_at')
                        ->get();
        return view('asesor/convocatoria.index',['convocatorias'=>$convocatorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->rol_id != 3) return redirect('/asesor');

        $fondos = Fondo::pluck('fondo','id');
        return view('asesor/convocatoria.create',compact('fondos'));
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
            'convocatoria' => 'required|max:255',
            'descripcion' => 'required|max:500',
            'fondos_id' => 'required|max:255',
        ]);
//        return $request->all();
        Convocatoria::create($request->all());
        return redirect('/asesorconvocatoria')->with('success','Convocatoria registrada correctamente');
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

        $convocatoria = Convocatoria::findOrFail($id);
        $fondos = Fondo::pluck('fondo','id');
        return view('asesor/convocatoria.edit',['convocatoria'=>$convocatoria,'fondos'=>$fondos]);
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
            'convocatoria' => 'required|max:255',
            'descripcion' => 'required|max:500',
            'fondos_id' => 'required|max:255',
        ]);

        Convocatoria::find($id)->update($request->all());
        //$programa->update($request->all());
        return redirect('/asesorconvocatoria')
                           ->with('success','Convocatoria actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Convocatoria::find($id)->delete();
        return redirect('/asesorconvocatoria')
                        ->with('success','Convocatoria borrada correctamente');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Convocatoria;
use App\Institucion;

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
                        ->join('instituciones', 'convocatorias.institucion_id', '=', 'instituciones.id')
                        ->select('convocatorias.*', 'instituciones.institucion')
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

        $instituciones = Institucion::pluck('institucion','id');
        return view('asesor/convocatoria.create',compact('instituciones'));
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
            'institucion_id' => 'required|max:255',
        ]);
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
        $instituciones = Institucion::pluck('institucion','id');
        return view('asesor/convocatoria.edit',['convocatoria'=>$convocatoria,'instituciones'=>$instituciones]);
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
            'institucion_id' => 'required|max:255',
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

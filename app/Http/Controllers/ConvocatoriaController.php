<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Convocatoria;
use App\Fondo;

class ConvocatoriaController extends Controller
{

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


    public function create()
    {
        if (Auth::user()->rol_id != 3) return redirect('/asesor');

        $fondos = Fondo::pluck('fondo','id');
        return view('asesor/convocatoria.create',compact('fondos'));
    }


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


    public function edit($id)
    {
        if (Auth::user()->rol_id != 3) return redirect('/asesor');

        $convocatoria = Convocatoria::findOrFail($id);
        $fondos = Fondo::pluck('fondo','id');
        return view('asesor/convocatoria.edit',['convocatoria'=>$convocatoria,'fondos'=>$fondos]);
    }

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

    public function destroy($id)
    {
        Convocatoria::find($id)->delete();
        return redirect('/asesorconvocatoria')
                        ->with('success','Convocatoria borrada correctamente');
    }
}

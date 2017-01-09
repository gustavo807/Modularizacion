<?php

namespace App\Http\Controllers;

use App\Institucion;
use App\Fondo;
use Session;
use App\Institucion_Fondo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InstitucionFondoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $instituciones = Institucion::pluck('institucion','id');

      return view('asesor.institucionfondo.create', ['instituciones'=>$instituciones]);
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
          'institucion' => 'required|max:255|unique:instituciones,id,'.$request->get('institucion'),
      ]);

      $idFondo = Session::get('idFondo');
      if (isset($idFondo)) {
        /*Institucion_Fondo::create([
          'institucion_id' => $request['institucion'],
          'fondo_id' => $idFondo
        ]);*/
        $fondo = Fondo::find($idFondo);
        $fondo->instituciones()->sync([$request->get('institucion')], false);
        return redirect('/asesorinstitucionfondo/'.$idFondo)->with('success','Institución registrada correctamente');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if (Auth::user()->rol_id != 3) return redirect('/asesor');
      Session::put('idFondo', $id);
      $arrayOfFondosId = DB::table('fondos')->select('fondos.id as id')->where('fondos.id', '=', $id)->pluck('id');

      $institucionFondos = DB::table('fondo_institucion')
                                ->select('instituciones.institucion as institucion', 'instituciones.id as id')
                                ->join('instituciones','instituciones.id' , '=', 'fondo_institucion.institucion_id')
                                ->whereIn('fondo_institucion.fondo_id', $arrayOfFondosId)
                                ->get();

      return view('asesor/institucionfondo.index', ['instituciones'=>$institucionFondos]);
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
        $instituciones = Institucion::pluck('institucion', 'id');
        $institucionId = Institucion::findOrFail($id);

        return view('asesor.institucionfondo.edit',['instituciones'=>$instituciones, 'fondo'=>$institucionId]);

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
          //'institucion' => 'required|unique:fondo_institucion,institucion_id,'.$request->get('institucion'),
      ]);

      $idFondo = Session::get('idFondo');
      if (isset($idFondo)) {
        //$oldInstitucion = Institucion::find($id);
        //$fondo = Fondo::find($idFondo);
        //$newFondo = $request->get('institucion');

        //Institucion_Fondo::actualizar($oldInstitucion->id, $fondo->id, $newFondo);
        $fondo = Fondo::find($idFondo);
        $fondo->instituciones()->syncWithoutDetaching([$request->get('institucion')], false);

        return redirect('/asesorinstitucionfondo/'.$idFondo)->with('success','Institucion actualizada correctamente');

      }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto_Clave;
use App\Proyecto;
use App\Modulo;
use App\Clave;
use Session;

class EProyectoController extends Controller
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
        //
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
          'valor' => 'required',
          'clave_id' => 'required',
      ]);

      $propietario = 'empresa';
      $idproyecto = Session::get('idproyecto');
      if (is_array($request['valor']) && is_array($request['clave_id'])) {
        for ($i=0; $i < count($request['valor']) && $i < count($request['clave_id']); $i++) {
            $registro = Proyecto_Clave::registro($idproyecto,$request['clave_id'][$i],$propietario);
            if(count($registro) == 0){
              Proyecto_Clave::create([
                'proyecto_id' => $idproyecto,
                'clave_id' => $request['clave_id'][$i],
                'valor' => $request['valor'][$i],
                'propietario' => $propietario,
              ]);
            }
            else{
              Proyecto_Clave::actualiza($idproyecto, $request['clave_id'][$i], $propietario, $request['valor'][$i]);
            }

        }//cliclo for
      }
      return redirect('/empresaparrafo')->with('success','Claves registradas correctamente  Ahora selecciona un parrafo ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $iduser = $request->user()->id;
        $propietario = 'empresa';
        Session::put('idproyecto', $id);
        $proyecto = Proyecto::findOrFail($id);
        $modulos = Modulo::proyectosmodulo($id,$propietario);
        return view('empresa.proyecto.index',['proyecto'=>$proyecto,'modulos'=>$modulos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        Session::put('idmoduloconv', $id);
        $idproyecto = Session::get('idproyecto');
        $iduser = $request->user()->id;
        $propietario = 'empresa';
        $claves = Clave::clavesmoduloproyecto($id,$idproyecto,$propietario);
        return view('empresa/proyecto.edit',['claves'=>$claves]);
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
        //
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Modulo;
use App\Clave;
use App\User_Clave;
class EModuloGnrlController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modulos = Modulo::modulosgnrl();
        return view('empresa/modulognrl.index',['modulos'=>$modulos]);
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
      $iduser = $request->user()->id;
      if (is_array($request['valor']) && is_array($request['clave_id'])) {
        for ($i=0; $i < count($request['valor']) && $i < count($request['clave_id']); $i++) {
            $registro = User_Clave::registro($iduser,$request['clave_id'][$i],$propietario);
            if(count($registro) == 0){
              User_Clave::create([
                'user_id' => $iduser,
                'clave_id' => $request['clave_id'][$i],
                'valor' => $request['valor'][$i],
                'propietario' => $propietario,
              ]);
            }
            else{
              User_Clave::actualiza($iduser, $request['clave_id'][$i], $propietario, $request['valor'][$i]);
            }

        }//cliclo for
      }
      return redirect('/empresaparrafognrl')->with('success','Claves registradas correctamente  Ahora selecciona un parrafo ');
      //return view('borrame',['request'=>$request]);
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
    public function edit(Request $request, $id)
    {
        Session::put('idmodulognrl', $id);
        $iduser = $request->user()->id;
        $propietario = 'empresa';
        $claves = Clave::clavesmodulo($id,$iduser,$propietario);
        return view('empresa/modulognrl.edit',['claves'=>$claves]);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\User_Clave;
use Session;
use App\Proyecto;

class AEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $empresas = User::all()->where('rol_id','=', '1');
      return view('asesor.empresa.index',['empresas'=>$empresas]);
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Session::put('idempresa',$id);
        $empresa = User::findOrFail($id);
        $proyectos = Proyecto::proyectoconvocatoria($id);
        return view('asesor.empresa.verempresa',['empresa'=>$empresa,'proyectos'=>$proyectos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $propietario='empresa';
      $claves = User_Clave::clavesusuario($id,$propietario);
      $empresa = User::findOrFail($id);
      return view('asesor.empresa.info',['empresa'=>$empresa,'claves'=>$claves]);
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
        $user = User::findOrFail($id);
        $activo = '1';

        if($user['activo'] == '1') $activo = '2';

        User::findOrFail($id)->update([ 'activo'=>$activo, ]);

        return redirect('/asesorempresa')->with('success','La accion se llevo correctamente ');
    }

    //COPIA LA INFORMACION DE ESTA EMPRESA
    public function copy($id)
    {
        $proyecto = User::findOrFail($id);
        User::copyempresa_borra($id);
        User::copyempresa_crea($id);
        return redirect('/asesorempresa')->with('success', 'Información copiada correctamente');
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

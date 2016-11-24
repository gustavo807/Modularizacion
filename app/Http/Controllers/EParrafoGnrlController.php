<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User_Parrafo;
use App\Parrafo;
use App\Clave;
use App\User_Clave;

class EParrafoGnrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $iduser = $request->user()->id;
        $propietario = 'empresa';

        $idmodulo = '0';
        $idmodulo = Session::get('idmodulognrl');
        $parrafos = Parrafo::parrafosmodulos($idmodulo);
        $userparrafo = User_Parrafo::userparrafo($iduser,$propietario,$idmodulo);
        $claves = User_Clave::clavesusuario($iduser,$propietario);

        return view('empresa/parrafognrl.index',['parrafos'=>$parrafos,'claves'=>$claves,'userparrafo'=>$userparrafo]);
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
      $iduser = $request->user()->id;
      $propietario = 'empresa';
      $idmodulo = '0';
      $idmodulo = Session::get('idmodulognrl');

      $userparrafo = User_Parrafo::userparrafo($iduser,$propietario,$idmodulo);
      if(isset($userparrafo)){
        User_Parrafo::actualizaparrafo($iduser,$propietario,$idmodulo,$request['observacion'],$request['parrafo']);
      }
      else{
        User_Parrafo::create([
          'user_id' => $iduser,
          'parrafo_id' => $request['parrafo'],
          'observacion' => $request['observacion'],
          'propietario' => $propietario,
        ]);
      }
      return redirect('/empresaimagengnrl')->with('success','Parrafo registrado correctamente,  Ahora selecciona un imagen ');
      
        //return view('borrame');
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
        //
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

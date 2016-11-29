<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;
use App\User_Imagen;
use App\User_Modulo;
use Session;
class EImagenGnrlController extends Controller
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
        $imagenes = Imagen::imagenesmodulo($idmodulo);
        $userimagen = User_Imagen::userimagen($iduser,$propietario,$idmodulo);
        return view('empresa/imagengnrl.index',['imagenes'=>$imagenes,'userimagen'=>$userimagen]);
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

      $userimagen = User_Imagen::userimagen($iduser,$propietario,$idmodulo);
      if(isset($userimagen)){
        User_Imagen::actualizaimagen($iduser,$propietario,$idmodulo,$request['imagen']);
      }
      else{
        User_Imagen::create([
          'user_id' => $iduser,
          'imagen_id' => $request['imagen'],
          'propietario' => $propietario,
        ]);
      }

      $usermodulo = User_Modulo::usermodulo($iduser,$propietario,$idmodulo);
      if(!isset($usermodulo)){
        User_Modulo::create([
          'user_id' => $iduser,
          'modulo_id' => $idmodulo,
          'propietario' => $propietario,
        ]);
      }

      return redirect('/empresamodulognrl')->with('success','Modulo completado correctamente ');

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

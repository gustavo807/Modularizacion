<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;
use App\Proyecto_Imagen;
use App\Proyecto_Modulo;
use Session;

class EImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $propietario = 'empresa';

      $idmodulo = '0';
      $idmodulo = Session::get('idmoduloconv');
      $idproyecto = Session::get('idproyecto');
      $imagenes = Imagen::imagenesmodulo($idmodulo);
      $proyectoimagen = Proyecto_Imagen::proyectoimagen($idproyecto,$propietario,$idmodulo);
        return view('empresa.imagen.index',['imagenes'=>$imagenes,'proyectoimagen'=>$proyectoimagen]);
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
      $idproyecto = Session::get('idproyecto');
      $propietario = 'empresa';
      $idmodulo = '0';
      $idmodulo = Session::get('idmoduloconv');

      $proyectoimagen = Proyecto_Imagen::proyectoimagen($idproyecto,$propietario,$idmodulo);
      if(isset($proyectoimagen)){
        Proyecto_Imagen::actualizaimagen($idproyecto,$propietario,$idmodulo,$request['imagen']);
      }
      else{
        Proyecto_Imagen::create([
          'proyecto_id' => $idproyecto,
          'imagen_id' => $request['imagen'],
          'propietario' => $propietario,
        ]);
      }

      $proyectomodulo = Proyecto_Modulo::proyectomodulo($idproyecto,$propietario,$idmodulo);
      if(!isset($proyectomodulo)){
        Proyecto_Modulo::create([
          'proyecto_id' => $idproyecto,
          'modulo_id' => $idmodulo,
          'propietario' => $propietario,
        ]);
      }

      return redirect('/empresa')->with('success','Modulo completado correctamente ');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto_Parrafo;
use App\Proyecto_Clave;
use App\Proyecto_Modulo;
use App\Parrafo;
use App\Imagen;
use Session;

class EParrafoController extends Controller
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
      $parrafos = Parrafo::parrafosmodulos($idmodulo);
      $proyectoparrafo = Proyecto_Parrafo::proyectoparrafo($idproyecto,$propietario,$idmodulo);
      $claves = Proyecto_Clave::clavesproyecto($idproyecto,$propietario);

      return view('empresa.parrafo.index',['parrafos'=>$parrafos,'claves'=>$claves,'proyectoparrafo'=>$proyectoparrafo]);
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
      $idmodulo = Session::get('idmoduloconv');
      $idproyecto = Session::get('idproyecto');

      // CREA O ACTUALIZA EL PARRAFO SELECCIONADO
      $proyectoparrafo = Proyecto_Parrafo::proyectoparrafo($idproyecto,$propietario,$idmodulo);
      if(isset($proyectoparrafo)){
        Proyecto_Parrafo::actualizaparrafo($idproyecto,$propietario,$idmodulo,$request['observacion'],$request['parrafo']);
      }
      else{
        Proyecto_Parrafo::create([
          'proyecto_id' => $idproyecto,
          'parrafo_id' => $request['parrafo'],
          'observacion' => $request['observacion'],
          'propietario' => $propietario,
        ]);
      }

      // VALIDAMOS SI EXISTEN IMAGENES EN ESE MODULO
      // DE LO CONTRARIO SE MARCA COMO COMPLETO ESE MODULO
      $imagenes = Imagen::all()->where('modulo_id','=',$idmodulo)->count();
      // NO EXISTEN IMAGENEES
      if($imagenes == 0)
      {
        $proyectomodulo = Proyecto_Modulo::proyectomodulo($idproyecto,$propietario,$idmodulo);
        if(!isset($proyectomodulo)){
          Proyecto_Modulo::create([
            'proyecto_id' => $idproyecto,
            'modulo_id' => $idmodulo,
            'propietario' => $propietario,
          ]);
        }
        return redirect('/empresa')->with('success','Modulo completado correctamente ');
        //return "No existe, ".$idmodulo.', '.$imagenes;
      }
      // SI EXISTEN IMAGENES
      else
      {
        return redirect('/empresaimagen')->with('success','Parrafo registrado correctamente,  Ahora selecciona un imagen ');
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

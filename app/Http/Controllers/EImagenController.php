<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imagen;
use App\Proyecto_Imagen;
use App\Proyecto_Modulo;
use App\Proyecto;
use App\Notificacion;
use Session;

class EImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $iduser = $request->user()->id;
      $idproyecto = Session::get('idproyecto');
      $proyecto = Proyecto::findOrFail($idproyecto);
      $propietario = 'empresa';

      if($proyecto->user_id != $iduser || Auth::user()->activo == 2)
        return redirect('/empresa');

      $idmodulo = '0';
      $idmodulo = Session::get('idmoduloconv');
      $imagenes = Imagen::imagenesmodulo($idmodulo);
      $proyectoimagen = Proyecto_Imagen::proyectoimagen($idproyecto,$propietario,$idmodulo);


      return view('empresa.imagen.index',['imagenes'=>$imagenes,'proyectoimagen'=>$proyectoimagen]);


    }

    
    public function store(Request $request)
    {
      $idproyecto = Session::get('idproyecto');
      $propietario = 'empresa';
      $idmodulo = '0';
      $idmodulo = Session::get('idmoduloconv');

      $this->validate($request, [
        'imagen' => 'required',
      ]);

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

      // Enviar notificacion
        $proyecto = Proyecto::findOrFail($idproyecto);
        Notificacion::sendnotification_convocatoria($idmodulo, $idproyecto,$request->user()->nombre,$proyecto->nombre);
        //

      return redirect('/empresaproyecto/'.$idproyecto)->with('success','Modulo completado correctamente ');
    }

    
}

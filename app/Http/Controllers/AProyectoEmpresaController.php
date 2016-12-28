<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Modulo;
use App\Clave;
use Validator;
use App\Proyecto_Clave;
use App\Proyecto_Parrafo;
use App\Proyecto_Imagen;
use App\Proyecto_Modulo;
use App\User_Clave;
use App\Parrafo;
use App\Imagen;

class AProyectoEmpresaController extends Controller
{
  public function modulos($id)
  {
      $proyecto = Proyecto::findOrFail($id);
      $modulos = Modulo::proyectosmodulo($id,'asesor');
      return view('asesor.proyectoempresa.modulos',['proyecto'=>$proyecto,'modulos'=>$modulos]);
      //return 'hola'.$id;
  }

  public function clavesmodulo($id,$idproyecto)
  {
    $proyecto = Proyecto::findOrFail($idproyecto);
    $modulo = Modulo::findOrFail($id);
    $claves = Clave::clavesmoduloproyecto($id,$idproyecto,'asesor');
    return view('asesor.proyectoempresa.claves',['claves'=>$claves,'proyecto'=>$proyecto,'modulo'=>$modulo]);
  }

  public function store(Request $request)
  {
      $proyecto = Proyecto::findOrFail($request->proyecto);
      if (isset($request['valor'])) {
            $rules = [];
            foreach ($request->get('valor') as $key => $val)
              $rules['valor.'.$key] = 'required|max:2000';

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
              //$idmodu = Session::get('idmoduloconv');
              return redirect('/clavesmodulo/'.$request->modulo.'/proyecto/'.$request->proyecto)->withErrors($validator);
            }
      }
      else {
            $this->validate($request, [
              'valor' => 'required|max:2000',
              'clave_id' => 'required|max:255',
          ]);
      }

      $propietario = 'asesor';

      if (is_array($request['valor']) && is_array($request['clave_id'])) {
        for ($i=0; $i < count($request['valor']) && $i < count($request['clave_id']); $i++) {
            $registro = Proyecto_Clave::registro($proyecto->id,$request['clave_id'][$i],$propietario);
            if(count($registro) == 0){
              Proyecto_Clave::create([
                'proyecto_id' => $proyecto->id,
                'clave_id' => $request['clave_id'][$i],
                'valor' => $request['valor'][$i],
                'propietario' => $propietario,
              ]);
            }
            else{
              Proyecto_Clave::actualiza($proyecto->id, $request['clave_id'][$i], $propietario, $request['valor'][$i]);
            }

        }//cliclo for
      }
      return redirect('/parrafoproyecto/'.$request->modulo.'/proyecto/'.$request->proyecto)->with('success','Claves registradas correctamente  Ahora selecciona un parrafo ');
      //return 'hola';
  }

  public function parrafoproyecto($id,$idproyecto)
  {
    $proyecto = Proyecto::findOrFail($idproyecto);
    $modulo = Modulo::findOrFail($id);
    $propietario = 'asesor';
    $parrafos = Parrafo::parrafosmodulos($id);
    $proyectoparrafo = Proyecto_Parrafo::proyectoparrafo($idproyecto,$propietario,$id);
    $claves = Proyecto_Clave::getclavesuser($idproyecto,$propietario);
    $clavesg = User_Clave::getclaves($proyecto->user->id, $propietario);
    //return $proyecto->user->id;
    return view('asesor.proyectoempresa.parrafos',['proyecto'=>$proyecto,'modulo'=>$modulo, 'parrafos'=>$parrafos,'claves'=>$claves,'proyectoparrafo'=>$proyectoparrafo,'clavesg'=>$clavesg]);
      return 'hola'.$id;
  }

  public function storeparrafoproyecto(Request $request)
  {
    $proyecto = Proyecto::findOrFail($request->proyecto);
    $modulo = Modulo::findOrFail($request->modulo);
    $propietario = 'asesor';
    $this->validate($request, [
      'parrafo' => 'required',
      'observacion' => 'max:2000',
    ]);

    // CREA O ACTUALIZA EL PARRAFO SELECCIONADO
    $proyectoparrafo = Proyecto_Parrafo::proyectoparrafo($proyecto->id,$propietario,$modulo->id);
    if(isset($proyectoparrafo)){
      Proyecto_Parrafo::actualizaparrafo($proyecto->id,$propietario,$modulo->id,$request['observacion'],$request['parrafo']);
    }
    else{
      Proyecto_Parrafo::create([
        'proyecto_id' => $proyecto->id,
        'parrafo_id' => $request['parrafo'],
        'observacion' => $request['observacion'],
        'propietario' => $propietario,
      ]);
    }

    // VALIDAMOS SI EXISTEN IMAGENES EN ESE MODULO
    // DE LO CONTRARIO SE MARCA COMO COMPLETO ESE MODULO
    $imagenes = Imagen::all()->where('modulo_id','=',$modulo->id)->count();
    // NO EXISTEN IMAGENEES
    if($imagenes == 0)
    {
      $proyectomodulo = Proyecto_Modulo::proyectomodulo($proyecto->id,$propietario,$modulo->id);
      if(!isset($proyectomodulo)){
        Proyecto_Modulo::create([
          'proyecto_id' => $proyecto->id,
          'modulo_id' => $modulo->id,
          'propietario' => $propietario,
        ]);
      }
      return redirect('/modulosproyecto/'.$proyecto->id)->with('success','Modulo completado correctamente ');
      //return "No existe, ".$idmodulo.', '.$imagenes;
    }
    // SI EXISTEN IMAGENES
    else
    {
      return redirect('/imagenproyecto/'.$request->modulo.'/proyecto/'.$request->proyecto)->with('success','Parrafo registrado correctamente,  Ahora selecciona un imagen ');
    }

  }

  public function imagenproyecto($id,$idproyecto)
  {
    $proyecto = Proyecto::findOrFail($idproyecto);
    $modulo = Modulo::findOrFail($id);
    $propietario = 'asesor';

    $imagenes = Imagen::imagenesmodulo($modulo->id);
    $proyectoimagen = Proyecto_Imagen::proyectoimagen($idproyecto,$propietario,$modulo->id);
    return view('asesor.proyectoempresa.imagenes',['proyecto'=>$proyecto,'modulo'=>$modulo,'imagenes'=>$imagenes,'proyectoimagen'=>$proyectoimagen]);
  }

  public function storeimagenproyecto(Request $request)
  {
    $proyecto = Proyecto::findOrFail($request->proyecto);
    $modulo = Modulo::findOrFail($request->modulo);
    $propietario = 'asesor';
    $this->validate($request, [
      'imagen' => 'required',
    ]);

    $proyectoimagen = Proyecto_Imagen::proyectoimagen($proyecto->id,$propietario,$modulo->id);
    if(isset($proyectoimagen)){
      Proyecto_Imagen::actualizaimagen($proyecto->id,$propietario,$modulo->id,$request['imagen']);
    }
    else{
      Proyecto_Imagen::create([
        'proyecto_id' => $proyecto->id,
        'imagen_id' => $request['imagen'],
        'propietario' => $propietario,
      ]);
    }

    $proyectomodulo = Proyecto_Modulo::proyectomodulo($proyecto->id,$propietario,$modulo->id);
    if(!isset($proyectomodulo)){
      Proyecto_Modulo::create([
        'proyecto_id' => $proyecto->id,
        'modulo_id' => $modulo->id,
        'propietario' => $propietario,
      ]);
    }

    return redirect('/modulosproyecto/'.$proyecto->id)->with('success','Modulo completado correctamente ');
  }


}

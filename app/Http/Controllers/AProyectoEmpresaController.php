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
use App\Evaluacion;
use App\Evproyecto;
use App\Evariables;

class AProyectoEmpresaController extends Controller
{
  public function empresa($id)
  {
    $proyecto = Proyecto::findOrFail($id);
    $datos = Evaluacion::getrespuestas($id,'tecnico');  

    $array;
    foreach ($datos as $value) {
      $value->opcion = Evariables::getdatos($value->pregunta,$value->variable)->pluck('opcion','id');
      $array[]=$value;
    }

    return view('asesor.proyectoempresa.evaluacion',['array'=>$array,'proyecto'=>$proyecto]);
    //return $id;
  }

  public function pregunta($proyecto_id,$pregunta_id)
  {
    //Valida el proyecto
    $proyecto = Proyecto::findOrFail($proyecto_id);
    
    //valida la pregunta
    $pregunta = Evaluacion::findOrFail($pregunta_id);
    if($pregunta->tipo != 'tecnico') abort(404);

    $valor = Evproyecto::where('proyecto_id',$proyecto_id)->where('evaluacion_id',$pregunta_id)->first();
    //Opciones para la pregunta
    $opcion = Evariables::getdatos($pregunta->pregunta,$pregunta->variable)->pluck('opcion','id');

    return view('asesor.proyectoempresa.formevaluacion',['proyecto'=>$proyecto,'pregunta'=>$pregunta,'valor'=>$valor,'opcion'=>$opcion]);
  }

  public function update(Request $request, $id)
  {
    //return $request->all();
    //Valida el proyecto
    $proyecto = Proyecto::findOrFail($id);
    //valida la pregunta
    $pregunta = Evaluacion::findOrFail($request->pregunta_id);
    if($pregunta->tipo != 'tecnico') abort(404);

    //Opciones para la pregunta
    $opcion = Evariables::getdatos($pregunta->pregunta,$pregunta->variable)->pluck('id')->toArray();

    //Valida si el id de la opcion envia conincide con la respuesta
    if(! in_array($request->evariable_id, $opcion)) abort(404);

    Evproyecto::updateOrCreate(
      ['evaluacion_id' => $pregunta->id, 'proyecto_id' => $id],
      ['evariable_id' => $request->evariable_id]
      );

    return "hecho";
    return redirect('/modulosproyecto/proyecto/'.$id)->with('success','Respuesta registrada correctamente');
  }

  public function resultados($id)
  {
    //Valida el proyecto
      $proyecto = Proyecto::findOrFail($id);

      $variable=['RIESGO TÉCNICO','RIESGO DE PRODUCCIÓN','RIESGO COMERCIAL','RIESGO ESTRATÉGICO','RIESGO DE MERCADO','RIESGO FINANCIERO'];

      $data;
      foreach ($variable as $key => $value) 
        $data[] = Evproyecto::getresultados($id,$value);
      
      $nivel;
      foreach ($data as $key => $value) 
        $nivel[] = Evproyecto::calcula($value);
      
      $array;
      foreach ($variable as $key => $value) 
        $array[$key] = array('variable'=>$value,'promedio'=>$data[$key],'nivel'=>$nivel[$key]);
      
      array_push($array, array('variable'=>'TOTAL','promedio'=>(array_sum($data)/count($data)),'nivel'=>Evproyecto::calcula(array_sum($data)/count($data)) ));

      return view('asesor.proyectoempresa.resultados',['proyecto'=>$proyecto,'variable'=>$variable,'data'=>$data,'array'=>$array]);
  }

  public function modulos($id)
  {
      $proyecto = Proyecto::findOrFail($id);
      $modulos = Modulo::proyectosmodulo($id,'asesor');
      $status = Evproyecto::status_evaluacion($id);
      return view('asesor.proyectoempresa.modulos',['proyecto'=>$proyecto,'modulos'=>$modulos, 'status'=>$status]);
      //return 'hola'.$id;
  }

  public function clavesmodulo($id,$idproyecto)
  {
    $proyecto = Proyecto::findOrFail($idproyecto);
    $modulo = Modulo::findOrFail($id);
    $claves = Clave::clavesmoduloproyecto($id,$idproyecto,'asesor');

    if(count($claves) > 0)
      return view('asesor.proyectoempresa.claves',['claves'=>$claves,'proyecto'=>$proyecto,'modulo'=>$modulo]);
    else
      return redirect('/parrafoproyecto/'.$id.'/proyecto/'.$proyecto->id)->with('success','Selecciona un párrafo');
  }

  public function store(Request $request)
  {
      $proyecto = Proyecto::findOrFail($request->proyecto);
      if (isset($request['valor'])) {
            $rules = [];
            foreach ($request->get('valor') as $key => $val)
              $rules['valor.'.$key] = 'required|max:6000';

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
              //$idmodu = Session::get('idmoduloconv');
              return redirect('/clavesmodulo/'.$request->modulo.'/proyecto/'.$request->proyecto)->withErrors($validator);
            }
      }
      else {
            $this->validate($request, [
              'valor' => 'required|max:6000',
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

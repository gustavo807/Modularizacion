<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Proyecto_Clave;
use App\Ordena_Modulo;
use App\Proyecto_Modulo;
use App\Proyecto;
use App\Modulo;
use App\Clave;
use Session;
use Validator;
use App\Evaluacion;
use App\Euser;
use App\Evariables;
use App\Evproyecto;

class EProyectoController extends Controller
{
    public function preguntas(Request $request,$id)
    {
      $proyecto = Proyecto::findOrFail($id);
      if($proyecto->user_id != $request->user()->id) abort(404);

      $datos = Evaluacion::getrespuestas($id,'tecnico');   
      //return $datos; 

      $array;
      foreach ($datos as $value) {
        $value->opcion = Evariables::getdatos($value->pregunta,$value->variable)->pluck('opcion','id');
        $array[]=$value;
      }
      //return $array;

      return view('empresa.proyecto.evaluacion',['array'=>$array,'proyecto'=>$proyecto]);
    }

    public function evaluacion(Request $request,$idproyecto, $id)
    {
        //Valida el proyecto
        $proyecto = Proyecto::findOrFail($idproyecto);
        if($proyecto->user_id != $request->user()->id) abort(404);
        //valida la pregunta
        $pregunta = Evaluacion::findOrFail($id);
        if($pregunta->tipo != 'tecnico') abort(404);
        
        //$valor = Euser::where('evaluacion_id',$id)->where('user_id',$request->user()->id)->first();
        $valor = Evproyecto::where('proyecto_id',$idproyecto)->where('evaluacion_id',$id)->first();
        //Opciones para la pregunta
        $opcion = Evariables::getdatos($pregunta->pregunta,$pregunta->variable)->pluck('opcion','id');    

        //return $opcion;    
        return view('empresa.proyecto.formevaluacion',['proyecto'=>$proyecto,'pregunta'=>$pregunta,'valor'=>$valor,'opcion'=>$opcion]);
    }

    public function update(Request $request, $id)
    {
        
        //Valida el proyecto
        $proyecto = Proyecto::findOrFail($id);
        if($proyecto->user_id != $request->user()->id) abort(404);


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

        return 'hecho';
        //return redirect('/empresaproyecto/preguntas/'.$id)->with('success','Respuesta registrada correctamente');
    }

    public function resultados(Request $request,$id)
    {
      //Valida el proyecto
      $proyecto = Proyecto::findOrFail($id);
      if($proyecto->user_id != $request->user()->id) abort(404);

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

      return view('empresa.proyecto.resultados',['proyecto'=>$proyecto,'variable'=>$variable,'data'=>$data,'array'=>$array]);
      
    }

    public function store(Request $request)
    {
      $iduser = $request->user()->id;
      $idproyecto = Session::get('idproyecto');
      $proyecto = Proyecto::findOrFail($idproyecto);
    //  $proyecto = Proyecto::all()->where('user_id','=',$iduser)->first();

      if($proyecto->user_id != $iduser)
        return redirect('/empresa');


        if (isset($request['valor'])) {
              $rules = [];
              foreach ($request->get('valor') as $key => $val)
                $rules['valor.'.$key] = 'required|max:2000';

              $validator = Validator::make($request->all(), $rules);

              if ($validator->fails()) {
                $idmodu = Session::get('idmoduloconv');
                return redirect('/empresaproyecto/'.$idmodu.'/edit')->withErrors($validator);
              }
        }
        else {
              $this->validate($request, [
                'valor' => 'required|max:2000',
                'clave_id' => 'required|max:255',
            ]);
        }


      $propietario = 'empresa';

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
        $proyecto = Proyecto::findOrFail($id);

        if($proyecto->user_id != $iduser)
          return redirect('/empresa');

        if($request->user()->activo == 2 )
          return redirect('/eproyecto/'.$id);

        Session::put('nomproyecto',$proyecto->nombre);

        $propietario = 'empresa';
        Session::put('idproyecto', $id);
        $modulos = Modulo::proyectosmodulo($id,$propietario);
        $status = Evproyecto::status_evaluacion($id);
        return view('empresa.proyecto.index',['proyecto'=>$proyecto,'modulos'=>$modulos,'status'=>$status]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {   
        $idproyecto = Session::get('idproyecto');
        $proyecto = Proyecto::findOrFail($idproyecto);
        $iduser = $request->user()->id;

        // NO LE PERTENECE EL PROYECTO
        if($proyecto->user_id != $iduser || Auth::user()->activo == 2)
          return redirect('/empresa');

        // PRIMER MODULO
        $primer = Ordena_Modulo::primermodulo('2');

        if(count($primer) > 0)
        {
          if(isset($primer[0]->modulo_id)){
            if ($primer[0]->modulo_id != $id) {
              // EL MODULO ESTA COMPLETO
              $result = Proyecto_Modulo::proyectomodulo($idproyecto,'empresa',$id);
              if(!isset($result)){
                  $modulo = Ordena_Modulo::all()->where('modulo_id','=',$id)->first();
                  $validam = Ordena_Modulo::validamodulo($modulo['orden'], '2');
                  // VALIDA SI ES EL MODULO SIGUIENTE DE UN MODULO COMPLETO
                  if(isset($validam[0]->modulo_id)){
                    $result2 = Proyecto_Modulo::proyectomodulo($idproyecto,'empresa',$validam[0]->modulo_id);
                    if (!isset($result2->modulo_id)) {
                        //return 'Debes completar los modulos consecutivamente';
                        return redirect('/empresaproyecto/'.$idproyecto)->with('warning','Para avanzar debes contestar los modulos consecutivamente ');
                    }
                  }
              }// SI EXIETE EL MODULO SELECCIONADO
              //else
                //return $result->modulo_id.' MODULO SELECCIONADO';
            }//SI EL MODULO ES DIFERENTE DEL PRIMERO
          }// SI EXISTE EL PRIMER MODULO GNRL
        }

        Session::put('idmoduloconv', $id);
        $propietario = 'empresa';
        $claves = Clave::clavesmoduloproyecto($id,$idproyecto,$propietario);
        $modulo = Modulo::findOrFail($id);
        return view('empresa/proyecto.edit',['claves'=>$claves,'modulo'=>$modulo]);

    }

}

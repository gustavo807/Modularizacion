<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Modulo;
use App\Clave;
use App\User_Clave;
use App\User_Modulo;
use App\Ordena_Modulo;
use App\Evaluacion;
use App\Euser;
use App\Http\Requests\EMGnrlRequest;
use Validator;

class EModuloGnrlController extends Controller
{

    
    public function index(Request $request)
    {
        if($request->user()->activo == 2)
          return redirect('/einfognrl');

        $iduser = $request->user()->id;
        $propietario = 'empresa';

        $modulos = Modulo::modulosgnrl($iduser,$propietario);
        //$primer = Ordena_Modulo::primermodulo();
        //return $modulos;

        $status = Euser::status_evaluacion($iduser);
        return view('empresa/modulognrl.index',compact('modulos','status'));
    }

    
    public function create(Request $request)
    {
        $datos = Evaluacion::getdatos($request->user()->id,'competitividad');
        return view('empresa.modulognrl.evaluacion',['datos'=>$datos]);
    }

    public function show(Request $request, $id)
    {
      $this->validate($request, ['valor' => 'required', ]);
      $pregunta = Evaluacion::findOrFail($id);
      if($pregunta->tipo != 'competitividad') abort(404);
        $array = ['0','1'];
      if(!in_array($request->valor, $array)) abort(404);

      Euser::updateOrCreate(
            ['evaluacion_id' => $pregunta->id, 'user_id' => $request->user()->id],
            ['valor' => $request->valor, 'tipo' => 'competitividad']
        );

      return 'Respuesta registrada correctamente';
      /*
        $pregunta = Evaluacion::findOrFail($id);
        if($pregunta->tipo != 'competitividad') abort(404);
        $valor = Euser::where('evaluacion_id',$id)->where('user_id',$request->user()->id)->first();
        return view('empresa.modulognrl.formevaluacion',['pregunta'=>$pregunta,'valor'=>$valor]);
        */
    }

    public function storeecompetitividad(Request $request)
    {
        $this->validate($request, ['valor' => 'required', ]);
        $pregunta = Evaluacion::findOrFail($request->pregunta_id);
        if($pregunta->tipo != 'competitividad') abort(404);
        $array = ['0','1'];
        if(!in_array($request->valor, $array)) abort(404);

        Euser::updateOrCreate(
            ['evaluacion_id' => $pregunta->id, 'user_id' => $request->user()->id],
            ['valor' => $request->valor, 'tipo' => 'competitividad']
        );
        return redirect('/empresamodulognrl/create')->with('success','Respuesta registrada correctamente');
    }

    public function resultados(Request $request)
    {
      $id_user = $request->user()->id;
      $tipo = 'competitividad';
      $variable1=['Mercado y Ventas','Insumos, Productos  y Servicios', 'Procesos y Sistema de Gestión de la Calidad', 'Recursos humanos y Desarrollo Empresarial', 'Desarrollo en Innovación'];
      $data1;
      foreach ($variable1 as $key => $value) {
        $data1[] = Euser::resultados($id_user,$tipo,$value);
      }
      $variable2=['SOCIOS','TRABAJADORES','CLIENTES','COMUNIDAD','AMBIENTAL'];
      $data2;
      foreach ($variable2 as $key => $value) {
        $data2[] = Euser::resultados($id_user,$tipo,$value);
      }
      
      //Obtener las tablas 
      $nivel1;
      foreach ($data1 as $key => $value) {
        $nivel1[] = Euser::calcula($value);
      }
      $nivel2;
      foreach ($data2 as $key => $value) {
        $nivel2[] = Euser::calcula($value);
      }

      $array1;
      foreach ($variable1 as $key => $value) {
        $array1[$key] = array('variable'=>$value,'promedio'=>$data1[$key],'nivel'=>$nivel1[$key]);
        $array2[$key] = array('variable'=>$variable2[$key],'promedio'=>$data2[$key],'nivel'=>$nivel2[$key]);
      }

      $promedio1 = Euser::calcula(array_sum($data1)/count($data1));
      $promedio2 = Euser::calcula(array_sum($data2)/count($data2));
      //return $array2;
      return view('empresa.modulognrl.resultados',['variable1'=>$variable1,'data1'=>$data1,'variable2'=>$variable2,'data2'=>$data2,'array1'=>$array1,'array2'=>$array2, 'promedio1'=>$promedio1,'promedio2'=>$promedio2]);
    }    


    public function store(Request $request)
    {
      if (isset($request['valor'])) {
            $rules = [];
            foreach ($request->get('valor') as $key => $val)
              $rules['valor.'.$key] = 'required|max:2000';

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
              $idmodu = Session::get('idmodulognrl');
              return redirect('/empresamodulognrl/'.$idmodu.'/edit')->withErrors($validator);
            }
      }
      else {
            $this->validate($request, [
              'valor' => 'required|max:2000',
              'clave_id' => 'required|max:255',
          ]);
      }



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

    
    public function edit(Request $request, $id)
    {
      if( Auth::user()->activo == 2)
        return redirect('/empresa');

        $iduser = $request->user()->id;
        $propietario = 'empresa';

        Modulo::findOrFail($id); //Si el modulo no esta Error 404

        $primer = Ordena_Modulo::primermodulo();

        if(count($primer) > 0)
        {
          if(isset($primer[0]->modulo_id)){
            if ($primer[0]->modulo_id != $id) {
              $result = User_Modulo::usermodulo($iduser,$propietario,$id);
              if(!isset($result)){
                  $modulo = Ordena_Modulo::all()->where('modulo_id','=',$id)->first();
                  $validam = Ordena_Modulo::validamodulo($modulo['orden']);
                  if(isset($validam[0]->modulo_id)){
                    $result2 = User_Modulo::usermodulo($iduser,$propietario,$validam[0]->modulo_id);
                    if (!isset($result2->modulo_id)) {
                        //return 'Debes completar los modulos consecutivamente';
                        return redirect('/empresamodulognrl')->with('warning','Para avanzar debes contestar los modulos consecutivamente ');
                    }
                  }
              }// SI EXIETE EL MODULO SELECCIONADO
              //else
                //return $result->modulo_id.' MODULO SELECCIONADO';
            }//SI EL MODULO ES DIFERENTE DEL PRIMERO
          }// SI EXISTE EL PRIMER MODULO GNRL
        }
              
      // ya entro
      Session::put('idmodulognrl', $id);
      $modulo = Modulo::findOrFail($id);
      $claves = Clave::clavesmodulo($id,$iduser,$propietario);

      // Si el módulo no tiene claves
      if(count($claves) > 0)
          return view('empresa/modulognrl.edit',['claves'=>$claves,'modulo'=>$modulo]);
      else
        return redirect('/empresaparrafognrl')->with('success','Selecciona un párrafo');


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

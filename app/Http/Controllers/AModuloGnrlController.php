<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\User_Clave;
use App\User_Parrafo;
use App\User_Imagen;
use App\User_Modulo;
use App\Parrafo;
use App\Modulo;
use App\Imagen;
use App\Clave;
use Validator;
use App\Evaluacion;
use App\Euser;

class AModuloGnrlController extends Controller
{

    // Evaluacion de competitividad
    public function empresa($id)
    {
      $empresa = User::findOrFail($id);
      $datos = Evaluacion::getdatos($id,'competitividad');
      return view('asesor.moduloempresa.evaluacion',['datos'=>$datos,'empresa'=>$empresa]);    
    }

    public function pregunta($id,$idpregunta)
    {
      $empresa = User::findOrFail($id);
      $pregunta = Evaluacion::findOrFail($idpregunta);
      if($pregunta->tipo != 'competitividad') abort(404);

      $valor = Euser::where('evaluacion_id',$idpregunta)->where('user_id',$id)->first();
      return view('asesor.moduloempresa.formevaluacion',['pregunta'=>$pregunta,'valor'=>$valor,'empresa'=>$empresa]);
    }

    public function putpregunta(Request $request,$id,$idpregunta)
    {
      //return $request->valor;
      $empresa = User::findOrFail($id);
      $pregunta = Evaluacion::findOrFail($idpregunta);
      if($pregunta->tipo != 'competitividad') abort(404);
      
      $array = ['0','1'];
      if(!in_array($request->valor, $array)) abort(404);

      Euser::updateOrCreate(
            ['evaluacion_id' => $pregunta->id, 'user_id' => $id],
            ['valor' => $request->valor, 'tipo' => 'competitividad']
        );
      return "hecho";
      return redirect('/amodulognrl/empresa/'.$id)->with('success','Respuesta registrada correctamente');
    }

    public function resultados($id)
    {
      $empresa = User::findOrFail($id);

      $tipo = 'competitividad';
      $variable1=['Mercado y Ventas','Insumos, Productos  y Servicios', 'Procesos y Sistema de Gestión de la Calidad', 'Recursos humanos y Desarrollo Empresarial', 'Desarrollo en Innovación'];
      $data1;
      foreach ($variable1 as $key => $value) {
        $data1[] = Euser::resultados($id,$tipo,$value);
      }
      $variable2=['SOCIOS','TRABAJADORES','CLIENTES','COMUNIDAD','AMBIENTAL'];
      $data2;
      foreach ($variable2 as $key => $value) {
        $data2[] = Euser::resultados($id,$tipo,$value);
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
      return view('asesor.moduloempresa.resultados',['variable1'=>$variable1,'data1'=>$data1,'variable2'=>$variable2,'data2'=>$data2,'array1'=>$array1,'array2'=>$array2, 'promedio1'=>$promedio1,'promedio2'=>$promedio2,'empresa'=>$empresa]);
      return $id;
    }
    
    public function store(Request $request)
    {
        if (isset($request['valor'])) {
              $rules = [];
              foreach ($request->get('valor') as $key => $val)
                $rules['valor.'.$key] = 'required|max:2000';

              $validator = Validator::make($request->all(), $rules);

              if ($validator->fails()) {
                //$idmodu = Session::get('idmodulognrl');
                return redirect('/amodulognrl/'.$request->modulo.'/empresa/'.$request->empresa)->withErrors($validator);
              }
        }
        else {
              $this->validate($request, [
                'valor' => 'required|max:2000',
                'clave_id' => 'required|max:255',
            ]);
        }

        $propietario = 'asesor';
        $iduser = $request->empresa;
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
        return redirect('/parrafognl/'.$request->modulo.'/empresa/'.$request->empresa)->with('success','Claves registradas correctamente  Ahora selecciona un parrafo ');

    }

    
    


    public function show($id)
    {
        $empresa = User::findOrFail($id);
        $modulos = Modulo::modulosgnrl($id,'asesor');
        return view('asesor.moduloempresa.index',['empresa'=>$empresa,'modulos'=>$modulos]);
    }

    
    public function edit($id)
    {
        //$empresa = User::findOrFail($id);
        return 'hola'.$id;
    }

    public function modulognrl($id,$iduser)
    {
        $empresa = User::findOrFail($iduser);
        $modulo = Modulo::findOrFail($id);

        $claves = Clave::clavesmodulo($id,$iduser,'asesor');
        return view('asesor.moduloempresa.claves',['empresa'=>$empresa,'modulo'=>$modulo, 'claves'=>$claves]);
        //return 'hola'.$id;
    }

    public function parrafognl($id,$iduser)
    {
        $empresa = User::findOrFail($iduser);
        $modulo = Modulo::findOrFail($id);
        $claves = User_Clave::getclavesusuario($iduser,'asesor');
        $parrafos = Parrafo::parrafosmodulos($id);
        $userparrafo = User_Parrafo::userparrafo($iduser,'asesor',$id);

        return view('asesor.moduloempresa.parrafos',['empresa'=>$empresa,'modulo'=>$modulo,'claves'=>$claves,'parrafos'=>$parrafos,'userparrafo'=>$userparrafo]);
    }

    public function storeparrafo(Request $request)
    {
        $empresa = $request->empresa;
        $modulo = $request->modulo;
        $propietario = 'asesor';

        $this->validate($request, [
          'parrafo' => 'required',
          'observacion' => 'max:2000',
        ]);

        // CREA O ACTUALIZA EL PARRAFO SELECCIONADO
        $userparrafo = User_Parrafo::userparrafo($empresa,$propietario,$modulo);
        if(isset($userparrafo)){
          User_Parrafo::actualizaparrafo($empresa,$propietario,$modulo,$request['observacion'],$request['parrafo']);
        }
        else{
          User_Parrafo::create([
            'user_id' => $empresa,
            'parrafo_id' => $request['parrafo'],
            'observacion' => $request['observacion'],
            'propietario' => $propietario,
          ]);
        }

        // VALIDAMOS SI EXISTEN IMAGENES EN ESE MODULO
        // DE LO CONTRARIO SE MARCA COMO COMPLETO ESE MODULO
        $imagenes = Imagen::all()->where('modulo_id','=',$modulo)->count();
        // NO EXISTEN IMAGENEES
        if($imagenes == 0)
        {
          $usermodulo = User_Modulo::usermodulo($empresa,$propietario,$modulo);
          if(!isset($usermodulo)){
            User_Modulo::create([
              'user_id' => $empresa,
              'modulo_id' => $modulo,
              'propietario' => $propietario,
            ]);
          }
          return redirect('/amodulognrl/'.$request->empresa)->with('success','Modulo completado correctamente');
        }
        // SI EXISTEN IMAGENES
        else
        {
          return redirect('/imagengnl/'.$request->modulo.'/empresa/'.$request->empresa)->with('success','Parrafo registrado correctamente,  Ahora selecciona un imagen  ');
          //return redirect('/empresaimagengnrl')->with('success','Parrafo registrado correctamente,  Ahora selecciona un imagen ');
          //return view('asesor.moduloempresa.imagenes',['empresa'=>$empresa,'modulo'=>$modulo])->with('success','Parrafo registrado correctamente,  Ahora selecciona un imagen ');
        }
    }

    public function imagengnl($id,$iduser)
    {
        $empresa = User::findOrFail($iduser);
        $modulo = Modulo::findOrFail($id);
        $propietario = 'asesor';

        $imagenes = Imagen::imagenesmodulo($id);
        $userimagen = User_Imagen::userimagen($iduser,$propietario,$id);
        return view('asesor.moduloempresa.imagenes',['empresa'=>$empresa,'modulo'=>$modulo,'imagenes'=>$imagenes,'userimagen'=>$userimagen]);
        //return 'hola';
    }

    public function storeimagen(Request $request)
    {
      $empresa = $request->empresa;
      $modulo = $request->modulo;
      $propietario = 'asesor';

      $this->validate($request, [
        'imagen' => 'required',
      ]);

      $userimagen = User_Imagen::userimagen($empresa,$propietario,$modulo);
      if(isset($userimagen)){
        User_Imagen::actualizaimagen($empresa,$propietario,$modulo,$request['imagen']);
      }
      else{
        User_Imagen::create([
          'user_id' => $empresa,
          'imagen_id' => $request['imagen'],
          'propietario' => $propietario,
        ]);
      }

      $usermodulo = User_Modulo::usermodulo($empresa,$propietario,$modulo);
      if(!isset($usermodulo)){
        User_Modulo::create([
          'user_id' => $empresa,
          'modulo_id' => $modulo,
          'propietario' => $propietario,
        ]);
      }

      return redirect('/amodulognrl/'.$request->empresa)->with('success','Modulo completado correctamente');

    }


}

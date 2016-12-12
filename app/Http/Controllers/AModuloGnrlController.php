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

class AModuloGnrlController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = User::findOrFail($id);
        $modulos = Modulo::modulosgnrl($id,'asesor');
        return view('asesor.moduloempresa.index',['empresa'=>$empresa,'modulos'=>$modulos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $claves = User_Clave::clavesusuario($iduser,'asesor');
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

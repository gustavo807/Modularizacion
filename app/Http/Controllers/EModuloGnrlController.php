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
use App\Http\Requests\EMGnrlRequest;
use Validator;

class EModuloGnrlController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user()->activo == 2)
          return redirect('/einfognrl');

        $iduser = $request->user()->id;
        $propietario = 'empresa';

        $modulos = Modulo::modulosgnrl($iduser,$propietario);
        $primer = Ordena_Modulo::primermodulo();
//return $modulos.$primer;
        return view('empresa/modulognrl.index',['modulos'=>$modulos]);
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
      return view('empresa/modulognrl.edit',['claves'=>$claves,'modulo'=>$modulo]);


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

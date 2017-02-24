<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User_Parrafo;
use App\Parrafo;
use App\Clave;
use App\User_Clave;
use App\Imagen;
use App\User_Modulo;
use App\Ordena_Modulo;
use App\Notificacion;

class EParrafoGnrlController extends Controller
{
    
    public function index(Request $request)
    {
      if( Auth::user()->activo == 2)
        return redirect('/empresa');

        $iduser = $request->user()->id;
        $propietario = 'empresa';

        $idmodulo = '0';
        $idmodulo = Session::get('idmodulognrl');
        $parrafos = Parrafo::parrafosmodulos($idmodulo);
        $userparrafo = User_Parrafo::userparrafo($iduser,$propietario,$idmodulo);
        $claves = User_Clave::getclavesusuario($iduser,$propietario);

        return view('empresa/parrafognrl.index',['parrafos'=>$parrafos,'claves'=>$claves,'userparrafo'=>$userparrafo]);
    }

    public function store(Request $request)
    {
      $iduser = $request->user()->id;      
      $propietario = 'empresa';
      $idmodulo = '0';
      $idmodulo = Session::get('idmodulognrl');

      $this->validate($request, [
        'parrafo' => 'required',
        'observacion' => 'max:2000',
      ]);

      // CREA O ACTUALIZA EL PARRAFO SELECCIONADO
      $userparrafo = User_Parrafo::userparrafo($iduser,$propietario,$idmodulo);
      if(isset($userparrafo)){
        User_Parrafo::actualizaparrafo($iduser,$propietario,$idmodulo,$request['observacion'],$request['parrafo']);
      }
      else{
        User_Parrafo::create([
          'user_id' => $iduser,
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
        // Enviar notificacion
        $orden = Ordena_Modulo::orden(1)->pluck("id");
        $position = Ordena_Modulo::getposition($orden,$idmodulo);

        Notificacion::sendnotification_general($position, $request->user()->nombre);
        //
        $usermodulo = User_Modulo::usermodulo($iduser,$propietario,$idmodulo);
        if(!isset($usermodulo)){
          User_Modulo::create([
            'user_id' => $iduser,
            'modulo_id' => $idmodulo,
            'propietario' => $propietario,
          ]);
        }
        return redirect('/empresamodulognrl')->with('success','Modulo completado correctamente ');
        //return "No existe, ".$idmodulo.', '.$imagenes;
      }
      // SI EXISTEN IMAGENES
      else
      {
        return redirect('/empresaimagengnrl')->with('success','Parrafo registrado correctamente,  Ahora selecciona un imagen ');
      }

    }

    
}

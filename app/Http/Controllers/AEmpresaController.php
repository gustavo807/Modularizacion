<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\User_Clave;
use App\User_Parrafo;
use App\Doc_Usuario;
use Session;
use App\Proyecto;
use App\Proyecto_Clave;
use App\Proyecto_Parrafo;

class AEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $empresas = User::where('rol_id','=', '1')->paginate(10);
      return view('asesor.empresa.index',['empresas'=>$empresas]);
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Session::put('idempresa',$id);
        $empresa = User::findOrFail($id);
        $proyectos = Proyecto::proyectoconvocatoria($id);
        return view('asesor.empresa.verempresa',['empresa'=>$empresa,'proyectos'=>$proyectos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $propietario='empresa';
      $claves = User_Clave::clavesusuario($id,$propietario);
      $empresa = User::findOrFail($id);
      return view('asesor.empresa.info',['empresa'=>$empresa,'claves'=>$claves]);
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
        $user = User::findOrFail($id);
        $activo = '1';

        if($user['activo'] == '1') $activo = '2';

        User::findOrFail($id)->update([ 'activo'=>$activo, ]);

        return redirect('/asesorempresa')->with('success','La accion se llevo correctamente ');
    }

    //COPIA LA INFORMACION DE ESTA EMPRESA
    public function copy($id)
    {
        $proyecto = User::findOrFail($id);
        User::copyempresa_borra($id);
        User::copyempresa_crea($id);
        return redirect('/asesorempresa')->with('success', 'Información copiada correctamente');
    }

    //DOCUMENTOS EMPRESA
    public function documentos($id)
    {
        $empresa = User::findOrFail($id);
        $documentos = Doc_Usuario::consulta($id);
        return view('asesor.empresa.documentos',['documentos'=>$documentos, 'empresa'=>$empresa]);
    }



    public function informaciongnrl($id,$user)
    {
        $empresa = User::findOrFail($id);
        if($user != 'empresa' && $user != 'asesor') return redirect('/erros/404');

        $claves = User_Clave::claves($id, $user);
        return view('asesor.informacion.claves',['claves'=>$claves, 'empresa'=>$empresa, 'user'=>$user,'ruta'=>'gnrlparrafo','id'=>$id]);
        //return 'hola'.$id.$user;
    }

    public function gnrlparrafo($id,$user)
    {
        $empresa = User::findOrFail($id);
        if($user != 'empresa' && $user != 'asesor') return redirect('/erros/404');

        $parrafos = User_Parrafo::parrafosusuario($id, $user,'1');
        $claves = User_Clave::claves($id, $user);
        return view('asesor.informacion.parrafos',['parrafos'=>$parrafos,'claves'=>$claves, 'empresa'=>$empresa, 'user'=>$user,'ruta'=>'informaciognrl','id'=>$id]);
        //return 'hola'.$id.$user;
    }


    public function proyectoclaves($id,$user)
    {
        $proyecto = Proyecto::findOrFail($id);
        $empresa = User::findOrFail($proyecto->user_id);
        if($user != 'empresa' && $user != 'asesor') return redirect('/erros/404');

        $claves = Proyecto_Clave::claves($id, $user);

        return view('asesor.informacion.claves',['claves'=>$claves, 'empresa'=>$empresa, 'user'=>$user,'ruta'=>'proyectoparrafos','id'=>$id]);
        //return 'hola'.$id.$user;
    }

    public function proyectoparrafos($id,$user)
    {
        $proyecto = Proyecto::findOrFail($id);
        $empresa = User::findOrFail($proyecto->user_id);
        if($user != 'empresa' && $user != 'asesor') return redirect('/erros/404');

        $parrafos = Proyecto_Parrafo::parrafosproyecto($id, $user, '2');
        $claves = Proyecto_Clave::claves($id, $user);

        return view('asesor.informacion.parrafos',['parrafos'=>$parrafos,'claves'=>$claves, 'empresa'=>$empresa, 'user'=>$user,'ruta'=>'proyectoclaves','id'=>$id]);
        //return 'hola'.$id.$user;
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

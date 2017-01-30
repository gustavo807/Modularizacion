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
use App\Modulo;

class AEmpresaController extends Controller
{
    
    public function index()
    {
      //$empresas = User::where('rol_id','=', '1')->paginate(10);
      //$empresas = User::modulos('1','empresa');
      $modulos = Modulo::where('modulos.clasificacion_id','1')->count();
      return view('asesor.empresa.index',['modulos'=>$modulos]);
    }

    // Perfil de la empresa
    public function perfil($id)
    {
        $empresa = User::findOrFail($id);
        return view('asesor.empresa.perfil',['empresa'=>$empresa]);
        //return $empresa;
    }

    
    public function editperfil($tipo,$id)
    {
        $empresa = User::findOrFail($id);
        $array = ['nombre','email','password','foto'];
        if(!in_array($tipo, $array))
            abort(404);
        else
            return view('asesor.empresa.editperfil',['empresa'=>$empresa,'tipo'=>$tipo]);
    }

    public function updateperfil(Request $request,$id)
    {   
        $array = ['nombre','email','password','foto'];
        if(!in_array($request->tipo, $array))
            abort(404);

        //Si es password
        if($request->tipo == 'password')
            User::findOrFail($id)->update([ 'password'=>bcrypt($request->password), ]);
        else{
            //Si es foto
            if($request->tipo == 'foto')
                \Storage::delete(User::findOrFail($id)->foto);

            User::findOrFail($id)->update($request->all());            
        }

        return redirect('/asesorempresa/perfil/'.$id)->with('success','La accion se llevo correctamente ');
    }

    
    public function show($id)
    {
        Session::put('idempresa',$id);
        $empresa = User::findOrFail($id);
        $proyectos = Proyecto::proyectoconvocatoria($id);
        return view('asesor.empresa.verempresa',['empresa'=>$empresa,'proyectos'=>$proyectos]);
    }

   
    public function edit($id)
    {
      $propietario='empresa';
      $claves = User_Clave::clavesusuario($id,$propietario);
      $empresa = User::findOrFail($id);
      return view('asesor.empresa.info',['empresa'=>$empresa,'claves'=>$claves]);
    }

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

        //return $id.$user;

        //$claves = User_Clave::claves($id, $user);
        return view('asesor.informacion.claves',['empresa'=>$empresa, 'user'=>$user,'ruta'=>'gnrlparrafo','id'=>$id]);
        //return 'hola'.$id.$user;
    }



    public function gnrlparrafo($id,$user)
    {
        $empresa = User::findOrFail($id);
        if($user != 'empresa' && $user != 'asesor') return redirect('/erros/404');

        $parrafos = User_Parrafo::parrafosusuario($id, $user,'1');
        $claves = User_Clave::getclaves($id, $user);
        return view('asesor.informacion.parrafos',['parrafos'=>$parrafos,'claves'=>$claves, 'empresa'=>$empresa, 'user'=>$user,'ruta'=>'asesorempresa/claves','id'=>$id]);
        //return 'hola'.$id.$user;
    }


    public function proyectoclaves($id,$user)
    {
        $proyecto = Proyecto::findOrFail($id);
        $empresa = User::findOrFail($proyecto->user_id);
        if($user != 'empresa' && $user != 'asesor') return redirect('/erros/404');

        //$claves = Proyecto_Clave::claves($id, $user);

        return view('asesor.informacion.claves',['empresa'=>$empresa, 'user'=>$user,'ruta'=>'proyectoparrafos','id'=>$id]);
        //return 'hola'.$id.$user;
    }

    public function proyectoparrafos($id,$user)
    {
        $proyecto = Proyecto::findOrFail($id);
        $empresa = User::findOrFail($proyecto->user_id);
        if($user != 'empresa' && $user != 'asesor') return redirect('/erros/404');

        $parrafos = Proyecto_Parrafo::parrafosproyecto($id, $user, '2');
        $claves = Proyecto_Clave::getclavesuser($id, $user);
        $clavesg = User_Clave::getclaves($proyecto->user_id, $user);

        return view('asesor.informacion.parrafos',['parrafos'=>$parrafos,'claves'=>$claves, 'empresa'=>$empresa, 'user'=>$user,'ruta'=>'asesorempresa/proyecto/claves','id'=>$id,'clavesg'=>$clavesg]);
        //return 'hola'.$id.$user;
    }

    public function destroy($id)
    {
        //
    }
}

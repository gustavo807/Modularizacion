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
use App\Estado;
use App\Registro;
use App\User_Modulo;
use Carbon\Carbon;

class AEmpresaController extends Controller
{
    // Muestra la página principal
    public function index()
    {
      $modulos = Modulo::where('modulos.clasificacion_id','1')->count();
      return view('asesor.empresa.index',compact('modulos'));
    }

    // Perfil de la empresa
    public function perfil($id)
    {
        $empresa = User::findOrFail($id);
        return view('asesor.empresa.perfil',compact('empresa'));
    }

    // Editar el perfil del usuario    
    public function editperfil($tipo,$id)
    {
        $empresa = User::findOrFail($id);
        $array = ['nombre','email','password','foto','estado','ciudad'];
        $estados = Estado::estados();

        if(!in_array($tipo, $array))
            abort(404);
        else
            return view('asesor.empresa.editperfil',compact('empresa','tipo','estados'));
    }

    // Actualiza los datos del formulario
    public function updateperfil(Request $request,$id)
    {   
        $array = ['nombre','email','password','foto','estado','ciudad'];
        if(!in_array($request->tipo, $array))
            abort(404);

        //Si es password
        if($request->tipo == 'password')
            User::findOrFail($id)->update([ 'password'=>bcrypt($request->password), ]);
        else{
            //Si es foto
            if($request->tipo == 'foto')
                \Storage::delete(User::findOrFail($id)->foto);

            //Si es un estado
            if($request->tipo == 'estado') Estado::findestado($request->estado);

            User::findOrFail($id)->update($request->all());            
        }

        return redirect('/asesorempresa/perfil/'.$id)->with('success','La accion se llevo correctamente ');
    }

    // Muestra los modulos por convocatoria
    public function show($id)
    {
        Session::put('idempresa',$id);
        $empresa = User::findOrFail($id);
        $proyectos = Proyecto::proyectoconvocatoria($id);
        return view('asesor.empresa.verempresa',['empresa'=>$empresa,'proyectos'=>$proyectos]);
    }

    // Muestra las claves del $id del modulo que pasa como parametro   
    public function edit($id)
    {
      $propietario='empresa';
      $claves = User_Clave::clavesusuario($id,$propietario);
      $empresa = User::findOrFail($id);
      return view('asesor.empresa.info',['empresa'=>$empresa,'claves'=>$claves]);
    }

    // Actualiza los datos del formulario
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $activo = '1';

        if($user['activo'] == '1') $activo = '2';

        User::findOrFail($id)->update([ 'activo'=>$activo, ]);

        return redirect('/asesorempresa')->with('success','La accion se llevo correctamente ');
    }

    //COPIA LA INFORMACION DE ESTA EMPRESA
    public function copy(Request $request, $id)
    {
        setlocale(LC_TIME, 'es');
        $user_request = $request->user();
        $date = Carbon::now();
        $custom_date = $date->formatLocalized('%A %d de %B %Y, ').$date->format('h:i A');
        $m =  $user_request->nombre.' el '.$custom_date;

        $user = User::findOrFail($id);
        
        if($user->registros->isEmpty())
            $user->registros()->create(['nombre'=>$m]);
        else
            $user->registros()->update(['nombre'=>$m]);
    
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

    // Resumen general de las claves
    public function informaciongnrl($id,$user)
    {
        $empresa = User::findOrFail($id);
        if($user != 'empresa' && $user != 'asesor') 
            return redirect('/erros/404');

        return view('asesor.informacion.claves',['empresa'=>$empresa, 'user'=>$user,'ruta'=>'gnrlparrafo','id'=>$id,'tipo'=>'1']);
    }

    // Resumen general de los parrafos seleccionados
    public function gnrlparrafo($id,$user)
    {
        $empresa = User::findOrFail($id);
        if($user != 'empresa' && $user != 'asesor') 
            return redirect('/erros/404');

        $parrafos = User_Parrafo::parrafosusuario($id, $user,'1');
        $claves = User_Clave::getclaves($id, $user);

        return view('asesor.informacion.parrafos',['parrafos'=>$parrafos, 'claves'=>$claves, 'empresa'=>$empresa, 'user'=>$user,'ruta'=>'asesorempresa/claves','id'=>$id]);
    }

    // Muestra las claves por usuario
    public function proyectoclaves($id,$user)
    {
        $proyecto = Proyecto::findOrFail($id);
        $empresa = User::findOrFail($proyecto->user_id);
        
        if($user != 'empresa' && $user != 'asesor') 
            return redirect('/erros/404');

        return view('asesor.informacion.claves',['empresa'=>$empresa, 'user'=>$user,'ruta'=>'proyectoparrafos','id'=>$id,'tipo'=>'2']);
    }

    // Muestra los parrafos por usuario
    public function proyectoparrafos($id,$user)
    {
        $proyecto = Proyecto::findOrFail($id);
        $empresa = User::findOrFail($proyecto->user_id);
        if($user != 'empresa' && $user != 'asesor') return redirect('/erros/404');

        $parrafos = Proyecto_Parrafo::parrafosproyecto($id, $user, '2');
        $claves = Proyecto_Clave::getclavesuser($id, $user);
        $clavesg = User_Clave::getclaves($proyecto->user_id, $user);

        return view('asesor.informacion.parrafos',['parrafos'=>$parrafos, 'claves'=>$claves, 'empresa'=>$empresa, 'user'=>$user,'ruta'=>'asesorempresa/proyecto/claves','id'=>$id,'clavesg'=>$clavesg]);
        //return 'hola'.$id.$user;
    }

    public function destroy($id)
    {
        abort(404);
    }

    // Funcion guardar los modulos que fueron revisados por el asesor
    public function revisado(Request $request, $empresa_id, $modulo_id)
    {
        $empresa = User::findOrFail($empresa_id);
        $modulo = Modulo::findOrFail($modulo_id);

        //Si el modulo no es general
        if($modulo->clasificacion_id != 1) abort(404);

        //Si no tiene  el rol de empresa
        if($empresa->rol_id == 1)
        {
            if($request->value == '0')
                User_Modulo::firstOrCreate([
                    'user_id' => $empresa->id,
                    'modulo_id' => $modulo->id,
                    'propietario' => 'generales'
                ]);
            elseif ($request->value == '1') 
                User_Modulo::where('user_id',$empresa->id)
                            ->where('modulo_id',$modulo->id)
                            ->where('propietario','generales')
                            ->delete();
            else
                abort(404);
        }
        else
            abort(404);        
    }
}

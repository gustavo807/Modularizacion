<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Convocatoria;
use App\Proyecto;
use App\User;
use Session;

class AProyectoController extends Controller
{

    public function index()
    {
        abort(404);
    }

    public function create()
    {
        $convocatorias = Convocatoria::pluck('convocatoria','id');
        return view('asesor.proyecto.create',['convocatorias'=>$convocatorias]);
    }

    public function store(Request $request)
    {
      $this->validate($request, [
          'nombre' => 'required|max:255',
          'descripcion' => 'required|max:255',
          'convocatoria_id' => 'required|max:255',
      ]);
      $idempresa = Session::get('idempresa');
      $user = User::findOrFail($idempresa);

      if (isset($idempresa)) {
        Proyecto::create([
          'convocatoria_id' => $request['convocatoria_id'],
          'user_id' => $idempresa,
          'nombre' => $request['nombre'],
          'descripcion' => $request['descripcion'],
          'estado' => $user->estado,
          'ciudad' => $user->ciudad
        ]);
        return redirect('/asesorempresa/'.$idempresa)->with('success','Proyecto registrado correctamente');
      }

      //return Session::get('idempresa');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $convocatorias = Convocatoria::pluck('convocatoria','id');
      $proyecto = Proyecto::findOrFail($id);
      return view('asesor.proyecto.edit',['convocatorias'=>$convocatorias,'proyecto'=>$proyecto]);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'nombre' => 'required|max:255',
          'descripcion' => 'required|max:255',
          'convocatoria_id' => 'required|max:255',
      ]);
      $idempresa = Session::get('idempresa');

      if (isset($idempresa)) {
        Proyecto::find($id)->update([
          'convocatoria_id' => $request['convocatoria_id'],
          'user_id' => $idempresa,
          'nombre' => $request['nombre'],
          'descripcion' => $request['descripcion'],
        ]);

        return redirect('/asesorempresa/'.$idempresa)->with('success','Proyecto actualizado correctamente');
      }
    }

    public function destroy($id)
    {
        $idempresa = Session::get('idempresa');

        if (isset($idempresa)) {
          Proyecto::find($id)->delete();
          return redirect('/asesorempresa/'.$idempresa)->with('success','Proyecto actualizado correctamente');
        }
    }
}

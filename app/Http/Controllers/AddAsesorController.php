<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AddAsesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asesores = User::all()->where('rol_id','=', '4');
        return view('asesor.agrega.index',['asesores'=>$asesores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asesor.agrega.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'nombre' => 'required',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required',
          'password_confirm' => 'required',
      ]);
      User::create([
          'nombre' => $request['nombre'],
          'email' => $request['email'],
          'password' => bcrypt($request['password']),
          'rol_id' => '4', //$data['tipo'],
          'activo' => '1', //$data['activo'],
      ]);
      return redirect('/asesoradd')->with('success','Asesor registrado correctamente');
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
    public function edit($id)
    {
      $asesor = User::find($id);
      return view('asesor.agrega.edit',['asesor'=>$asesor]);
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
      $this->validate($request, [
          'nombre' => 'required',
          'email' => 'required|email|max:255',
          'password' => 'required',
          'password_confirm' => 'required',
      ]);
      User::find($id)->update([
          'nombre' => $request['nombre'],
          'email' => $request['email'],
          'password' => bcrypt($request['password']),
          'rol_id' => '4', //$data['tipo'],
          'activo' => '1', //$data['activo'],
      ]);
      return redirect('/asesoradd')->with('success','Asesor actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      User::find($id)->delete();
      return redirect('/asesoradd')->with('success','Asesor eliminado correctamente');
    }
}

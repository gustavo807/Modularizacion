<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AddAsesorController extends Controller
{
    
    // Display a listing of the resource.
    public function index()
    {
        if (Auth::user()->rol_id != 3)
          return redirect('/asesor');
        

        $asesores = User::all()->where('rol_id','=', '4');
        return view('asesor.agrega.index',['asesores'=>$asesores]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        if (Auth::user()->rol_id != 3) 
          return redirect('/asesor');

        return view('asesor.agrega.create');
    }

    
    // Store a newly created resource in storage.
    public function store(Request $request)
    {
      $this->validate($request, [
          'nombre' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|max:255',
          'password_confirm' => 'required|max:255',
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


    // Display the specified resource.
    public function show($id)
    {
        abort(404);
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
      if (Auth::user()->rol_id != 3) return redirect('/asesor'); 
      $asesor = User::findOrFail($id);
      return view('asesor.agrega.edit',['asesor'=>$asesor]);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'nombre' => 'required|max:255',
          'email' => 'required|email|max:255',
          'password' => 'required|max:255',
          'password_confirm' => 'required|max:255',
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

    // Remove the specified resource from storage.
    public function destroy($id)
    {
      User::find($id)->delete();
      return redirect('/asesoradd')->with('success','Asesor eliminado correctamente');
    }
}

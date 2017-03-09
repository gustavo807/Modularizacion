<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SedeRequest;
use App\Http\Requests\SedeUpdateRequest;
use App\Institution;
use App\Sede;
use App\User;
use App\Estado;

class SedeController extends Controller
{

    public function index()
    {
        return view('asesor.sedes.index');
    }

    public function create()
    {
        $i = Institution::pluck('nombre','id');
        $estados = Estado::estados();
        return view('asesor.sedes.create',compact('i','estados'));
    }

    public function store(SedeRequest $request)
    {
        Estado::findestado($request->estado);
        
        $u = User::create([
                'nombre'=>$request->nombre,                
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'estado'=>$request->estado,
                'ciudad'=>$request->ciudad,
                'foto'=>$request->foto,
                'activo'=>'1',
                'rol_id'=>'2'
        ]);

        Sede::create([
            'paginaweb'=>$request->paginaweb,
            'direccion'=>$request->direccion,
            'linkgooglemaps'=>$request->linkgooglemaps,
            'descripcion'=>$request->descripcion,
            'contacto'=>$request->contacto,
            'telefono'=>$request->telefono,
            'correo'=>$request->correo,
            'user_id' => $u->id,
            'institution_id'=>$request->institution_id
        ]);

        return redirect('sedes')->with('success','Sede registrada correctamente');
    }

    public function show($id)
    {
        abort(404);
    }

    public function edit($id)
    {
        $u = User::findOrFail($id);
        if($u->rol_id != '2') abort(404);
        $i = Institution::pluck('nombre','id');
        $estados = Estado::estados();
        return view('asesor.sedes.edit',compact('u','i','estados'));
    }

    public function update(SedeUpdateRequest $request, $id)
    {
        $u = User::findOrFail($id);
        if($u->rol_id != '2') abort(404);

        Estado::findestado($request->estado);
        
        if(! empty($request->foto)) \Storage::delete($u->foto);

        $u->update($request->intersect(['nombre', 'foto', 'email','estado','ciudad']));
        
        if(! empty($request->password)) $u->update(['password'=>bcrypt($request->password)]);
        
        $sede_id = '0';
        if(! empty($u->sede->id)) $sede_id = $u->sede->id;
        Sede::updateOrCreate(
            [
                'id'=>$sede_id,
                'user_id'=>$u->id
            ], 
            $request->intersect([
                    'paginaweb', 
                    'direccion',
                    'linkgooglemaps',
                    'descripcion',
                    'contacto',
                    'telefono',
                    'correo',
                    'institution_id'
            ])
        );

        return redirect('sedes')->with('success','Sede actualizada correctamente');
    }

    public function destroy($id)
    {
        abort(404);
    }
}

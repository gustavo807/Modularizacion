<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Vinculado;
use App\Estado;
use App\Ciudad;
class DatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $states = Estado::pluck('estado','id');
        //$ciudades = Ciudad::pluck('ciudad','id');
        $vinculado = DB::table('vinculados')
                        ->join('ciudades', 'vinculados.ciudad_id', '=', 'ciudades.id')
                        ->select('vinculados.*', 'ciudades.ciudad','ciudades.estado_id')
                        ->where('user_id','=',$id)
                        ->first();


        
        
        if($vinculado != null){
            return view('vinculado/datos.index',['vinculado' => $vinculado, 'user' => $user]);
        }
        else{
            $ciudades=null;
            return view('vinculado/datos.create',['vinculado' => $vinculado, 'user' => $user, 'states' => $states, 'ciudades'=>$ciudades]);
        }
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
        $this->validate($request, [
            'descripcion' => 'required',
            'website' => 'required',
            'video' => 'required',
            'contacto_nombre' => 'required',
            'contacto_email' => 'required',
            'contacto_telefono' => 'required',
            'ciudad_id' => 'required',
            'direccion' => 'required',
        ]);
        Vinculado::create($request->all());
        return redirect('/datosvinculado')->with('success','Datos registrados correctamente');
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
        $id = Auth::user()->id;
        $user = User::find($id);
        $states = Estado::pluck('estado','id');
        
        
        $vinculado = DB::table('vinculados')
                        ->join('ciudades', 'vinculados.ciudad_id', '=', 'ciudades.id')
                        ->select('vinculados.*', 'ciudades.ciudad','ciudades.estado_id')
                        ->where('user_id','=',$id)
                        ->first();

                                                                                      
        $ciudades = DB::table('ciudades')
                        ->where('estado_id','=',$vinculado->estado_id)
                        ->pluck('ciudad','id');
        

        if($vinculado != null){
            return view('vinculado/datos.edit',['vinculado' => $vinculado, 'user' => $user, 'states' => $states, 'ciudades'=>$ciudades]);
        }
        else{
            $vinculado=null;
            $ciudades=null;
            return view('vinculado/datos.create',['vinculado' => $vinculado, 'user' => $user, 'states' => $states, 'ciudades'=>$ciudades]);
        }
    }

    public function borrame(){
        
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
            'descripcion' => 'required',
            'website' => 'required',
            'video' => 'required',
            'contacto_nombre' => 'required',
            'contacto_email' => 'required',
            'contacto_telefono' => 'required',
            'ciudad_id' => 'required',
            'direccion' => 'required',
        ]);
        Vinculado::find($id)->update($request->all()); 
        return redirect('/datosvinculado')->with('success','Datos actualizados correctamente');
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

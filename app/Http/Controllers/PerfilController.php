<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class PerfilController extends Controller
{
    public function index()
    {
    	//session(['info' => 'Proporcione una nuevo nombre y/o contraseña']);
        return view('perfil.index');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [	'nombre' => 'required|max:255',	]);
    	$iduser = $request->user()->id;

    	if(trim($request->password) != "")
    	{
    		$this->validate($request, [	'password' => 'max:255',	]);    		

    		if(trim($request->pass) != "")
    		{
				if($request->password != $request->pass)    			
    				return redirect('/perfil')->withErrors('Los campos password no coinciden');
    			else{
    				DB::table('users')
			            ->where('id', $iduser)
			            ->update(['nombre' => $request->nombre, 'password' => bcrypt($request->password)]);
			      	return redirect('/perfil')->with('success','Datos actualizados correctamente');
    			}
    		}
    		else
    			$this->validate($request, [	'pass' => 'required|max:255',	]);
    	}
    	DB::table('users')
            ->where('id', $iduser)
            ->update(['nombre' => $request->nombre]);
      	return redirect('/perfil')->with('success','Datos actualizados correctamente');
    }

}

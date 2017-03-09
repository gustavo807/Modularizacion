<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;


class AutenticacionController extends Controller
{

  //protected $redirectTo = '/admin';

    public function logueo(Request $request)
    {
      if(Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'activo' => 0])){
          return redirect('/login')->with('message', 'Por favor confirme su correo electrónico.');
      }
      else{
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) 
        {
            // Authentication passed

              if (Auth::user()->rol_id == 1)
                return redirect('/empresamodulognrl');
              else if (Auth::user()->rol_id == 2)
                return redirect('/proyectos'); //vista del vinculado
              else
                return redirect('/asesor');

        }
        else
        {
          return redirect('/login')->with('message', 'Asegurese de que su correo y contraseña sean correctos');
        }
      }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
      Auth::logout();

      flash('Has cerrado tu sesión correctamente.');
      return redirect('/');
    }

}

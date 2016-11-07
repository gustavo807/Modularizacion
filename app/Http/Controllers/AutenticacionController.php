<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutenticacionController extends Controller
{
    public function logueo(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            // Authentication passed...
            if (Auth::user()->rol_id == 1) {
            return redirect('/home');
            }else{
                return redirect('/empresa');
            }
            //return redirect('/home');
        }
        else{
            return redirect('/login');
        }

    }
}

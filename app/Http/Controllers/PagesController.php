<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function alivetech(){
        return view('athome');
    }

    public function industria(){
        return view('alivetech.industria');
    }

    public function academia(){
        return view('alivetech.academia');
    }

    public function gobierno(){
        return view('alivetech.gobierno');
    }

    public function transferencia(){
        return view('alivetech.transferencia');
    }

    public function home(){
        return view('welcome');
    }

    public function about(){
        return view('alivetech.about');
    }

    public function privacy(){
        return view('alivetech.privacy');
    }

    public function mail(){
        return view('mails.prospeccion');
    }


}

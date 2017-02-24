<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Modulo;

class AProyectoGnrlController extends Controller
{
    
    public function index()
    {
        $modulos = Modulo::all()->where('clasificacion_id','2')->count();
        return view('asesor.proyectognrl.index',['modulos'=>$modulos]);
    }

}

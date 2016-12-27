<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Modulo;

class CorsController extends Controller
{
    
    public function index()
    {
        return Proyecto::webservice();        
    }

    
    public function show($id)
    {
        return Proyecto::showwebservice($id);
    }

}

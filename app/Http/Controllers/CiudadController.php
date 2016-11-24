<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;

class CiudadController extends Controller
{
    public function getTowns(Request $request, $id){
        if($request->ajax()){
            $towns = Ciudad::towns($id);
            return response()->json($towns);
        }
    }
}

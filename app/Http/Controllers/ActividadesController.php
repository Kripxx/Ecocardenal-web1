<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    public function actividades()
    {
        
        return view('actividades.actividades');
    }
}

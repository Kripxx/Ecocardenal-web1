<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManualidadesController extends Controller
{
    /**
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('actividades.manualidades');
    }
}

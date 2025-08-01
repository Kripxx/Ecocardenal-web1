<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiDocsController extends Controller
{
    /**
     * Mostrar la documentación de la API
     */
    public function index()
    {
        return view('api.docs');
    }
}
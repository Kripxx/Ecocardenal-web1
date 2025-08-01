<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests\ValidadorRegistro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidadorRegistro $request)
    {
        DB::table('usuario')->insert([
            "nombreUsuario"=>$request->input('nombreUsuario'),
            "nombre"=>$request->input('txtnombre'),
            "apellido"=>$request->input('txtapellido'),
            "correo"=>$request->input('correo'),
            "password" =>Hash::make($request->input('password')),
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now()
        ]);
        $usuario=$request->input('txtnombre');
        session()->flash('exito','se guardo el usuario'.$usuario);
        return to_route('login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

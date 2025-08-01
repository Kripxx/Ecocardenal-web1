<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class InfoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
            return view('configuracion.editarPerfil');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
       // Validación del nuevo nombre de usuario
    $request->validate([
        'nombreUsuario' => 'required|string|max:255',
    ]);

    // Buscar al usuario en la base de datos usando el id pasado por la URI
    $usuario = Usuario::findOrFail($id);

    // Actualizar el nombre de usuario
    $usuario->nombreUsuario = $request->input('nombreUsuario');
    $usuario->save();  // Guardar el modelo actualizado en la base de datos

    // Actualizar la sesión con el nuevo nombre de usuario
    session()->put('nombreUsuario', $usuario->nombreUsuario);

    // Redirigir con un mensaje de éxito
    return redirect()->route('informacionUsuario')->with('success', '¡Nombre de usuario actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historia;

class HistoriasController extends Controller
{
    /**
     * Muestra la vista principal con todas las historias.
     */
    public function index()
    {
        $historias = Historia::orderBy('created_at', 'desc')->get();
        return view('historias.index', compact('historias'));
    }

    /**
     * Guarda una nueva historia en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'nullable|string|max:255',
            'contenido' => 'required|string',
        ]);

        Historia::create([
            'nombre' => $request->input('nombre', 'Anónimo'),
            'contenido' => $request->input('contenido'),
        ]);

        return redirect()->route('historias.index')->with('success', '¡Historia publicada exitosamente!');
    }

    /**
     * Elimina una historia específica.
     */
    public function destroy($id)
    {
        $historia = Historia::findOrFail($id);
        $historia->delete();

        return redirect()->route('historias.index')->with('success', '¡Historia eliminada exitosamente!');
    }
}

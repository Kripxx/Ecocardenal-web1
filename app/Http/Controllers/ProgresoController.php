<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgresoController extends Controller
{
    public function activities()
    {
        $usuarioId = session('usuario_id'); // Recupera el ID del usuario desde la sesión

        if ($usuarioId) { // Verifica si el usuario está autenticado
            $activities = DB::table('completed_activities')
                ->where('usuario_id', $usuarioId)
                ->orderBy('completed_at', 'desc')
                ->get();

            return view('progreso.activities', compact('activities'));
        } else {
            // Redirige al login si no hay usuario en la sesión
            return redirect()->route('login')->with('error', 'Por favor, inicia sesión para ver tus actividades.');
        }
    }
}

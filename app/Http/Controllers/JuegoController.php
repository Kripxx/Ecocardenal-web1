<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class JuegoController extends Controller
{
    /**
     * Muestra la vista principal del juego.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('actividades.juego');
    }

    public function saveScore(Request $request)
    {

        return response()->json(['message' => 'Puntuación guardada correctamente']);
    }
    public function finishGame(Request $request)
    {
        $usuarioId = auth()->id();
        $gameName = "Juego de Memoria";
        $points = 50; // Puntos fijos asignados al juego

        // Registrar en la base de datos
        DB::table('completed_activities')->insert([
            'usuario_id' => $usuarioId,
            'activity_type' => 'game',
            'activity_name' => $gameName,
            'points' => $points,
            'completed_at' => now(),
        ]);

        return redirect()->route('progreso.activities')->with('success', '¡Juego completado! Has ganado ' . $points . ' puntos.');
    }

}

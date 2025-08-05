<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Session;  
use Illuminate\Support\Facades\Log;

class ControladorVistas extends Controller
{
    public function index()
    {
        return view('index');
    }
    
    public function actividades()
    {
        return view('actividades');
    }

    public function progreso()
    {
        return view('progreso');
    }

    public function configuracion()
    {
        return view('configuracion');
    }

       public function verEstadisticas()
    {
        // Verificar si el usuario está logueado
        if (!Session::has('usuario_id')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión primero');
        }

        $usuarioId = Session::get('usuario_id');

        try {
            // Obtener datos del ranking
            $ranking = DB::table('ranking')
                        ->where('usuario_id', $usuarioId)
                        ->first();
            
            // Obtener actividades completadas
            $actividadesCompletadas = DB::table('completed_activities')
                                      ->where('usuario_id', $usuarioId)
                                      ->count();
            
            // Obtener logros obtenidos
            $logrosObtenidos = DB::table('usuario_logros')
                               ->where('usuario_id', $usuarioId)
                               ->count();
            
            // Calcular porcentaje
            $puntosTotales = $ranking ? ($ranking->total_points ?? 0) : 0;
            $meta = 1000; // Meta de puntos
            $porcentajeCompletado = min(round(($puntosTotales / max($meta, 1)) * 100, 2), 100);

            return view('progreso.ver-estadisticas', [
                'porcentajeCompletado' => $porcentajeCompletado,
                'logrosObtenidos' => $logrosObtenidos,
                'puntosTotales' => $puntosTotales,
                'actividadesCompletadas' => $actividadesCompletadas,
                'nombreUsuario' => Session::get('nombre') // Agregar nombre del usuario
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Error en verEstadisticas: ' . $e->getMessage());
            
            return view('progreso.ver-estadisticas', [
                'porcentajeCompletado' => 0,
                'logrosObtenidos' => 0,
                'puntosTotales' => 0,
                'actividadesCompletadas' => 0,
                'nombreUsuario' => Session::get('nombre')
            ]);
        }
    }

  public function logros()
{
    if (!session()->has('usuario_id')) {
        return redirect()->route('login')->with('error', 'Debes iniciar sesión primero');
    }

    $usuarioId = session('usuario_id');

    try {
        // Obtener todos los logros disponibles
        $todosLogros = DB::table('logros')->get();
        
        // Obtener logros desbloqueados por el usuario
        $logrosDesbloqueados = DB::table('usuario_logros')
            ->where('usuario_id', $usuarioId)
            ->pluck('logro_id')
            ->toArray();

        // Preparar datos para la vista con estructura consistente
        $logrosData = [];
        foreach ($todosLogros as $logro) {
            $logrosData[] = [
                'id' => $logro->id,
                'nombre' => $logro->nombre,
                'descripcion' => $logro->descripcion,
                'icono' => $this->obtenerIconoLogro($logro->id),
                'desbloqueado' => in_array($logro->id, $logrosDesbloqueados) // Asegurar que esta clave existe
            ];
        }

        return view('progreso.logros', [
            'logros' => $logrosData,
            'totalLogros' => count($todosLogros),
            'logrosDesbloqueados' => count($logrosDesbloqueados)
        ]);

    } catch (\Exception $e) {
        \Log::error('Error en logros: ' . $e->getMessage());
        return view('progreso.logros', [
            'logros' => [],
            'totalLogros' => 0,
            'logrosDesbloqueados' => 0
        ]);
    }
}

private function obtenerIconoLogro($logroId)
{
    $iconos = [
        1 => 'fa-medal text-warning',
        2 => 'fa-trophy text-success',
        3 => 'fa-star text-primary',
        4 => 'fa-award text-danger',
        5 => 'fa-gem text-info',
        6 => 'fa-crown text-gold'
    ];

    return $iconos[$logroId] ?? 'fa-certificate text-secondary';
}






    public function quizresultado() {
        return view('actividades.quiz-result');
    }
    
    



}


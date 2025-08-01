<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EstadisticasController extends Controller
{
    /**
     * Muestra la página de estadísticas con datos dinámicos
     */
    public function index()
    {
        try {
            // Obtener el usuario autenticado
            $usuarioId = Auth::id();
            
            // Obtener datos del ranking
            $ranking = DB::table('ranking')
                        ->where('usuario_id', $usuarioId)
                        ->first();
            
            // Obtener actividades completadas
            $actividadesCompletadas = DB::table('completed_activities')
                                      ->where('usuario_id', $usuarioId)
                                      ->count();
            
            // Obtener logros (ajusta según tu estructura real)
            $logrosObtenidos = DB::table('usuario_logros')
                               ->where('usuario_id', $usuarioId)
                               ->count();
            
            // Calcular puntos y porcentaje
            $puntosTotales = $ranking->total_points ?? 0;
            $meta = 1000; // Valor de ejemplo, reemplaza con tu lógica real
            $porcentajeCompletado = $this->calcularPorcentajeSeguro($puntosTotales, $meta);
            
            return view('estadisticas', [
                'porcentajeCompletado' => $porcentajeCompletado,
                'logrosObtenidos' => $logrosObtenidos,
                'puntosTotales' => $puntosTotales,
                'actividadesCompletadas' => $actividadesCompletadas
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error en EstadisticasController: ' . $e->getMessage());
            
            // Retornar vista con valores por defecto en caso de error
            return view('estadisticas', [
                'porcentajeCompletado' => 0,
                'logrosObtenidos' => 0,
                'puntosTotales' => 0,
                'actividadesCompletadas' => 0
            ]);
        }
    }
    
    /**
     * Calcula el porcentaje completado de forma segura
     */
    private function calcularPorcentajeSeguro($puntos, $meta)
    {
        try {
            // Validar y convertir valores
            $puntosNumericos = is_numeric($puntos) ? (float)$puntos : 0;
            $metaNumerica = is_numeric($meta) ? max((float)$meta, 1) : 1; // Evita división por cero
            
            // Calcular porcentaje con 2 decimales
            $porcentaje = round(($puntosNumericos / $metaNumerica) * 100, 2);
            
            // Limitar entre 0% y 100%
            return min(max($porcentaje, 0), 100);
            
        } catch (\Exception $e) {
            Log::error('Error en cálculo de porcentaje: ' . $e->getMessage());
            return 0;
        }
    }
}
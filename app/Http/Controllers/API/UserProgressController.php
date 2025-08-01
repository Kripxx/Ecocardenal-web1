<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompletedActivity;
use App\Models\Usuario;
use App\Models\Ranking;
use Illuminate\Support\Facades\Validator;

class UserProgressController extends Controller
{
    /**
     * Obtener las actividades completadas por el usuario autenticado
     */
    public function activities(Request $request)
    {
        // En una implementación completa, usarías Auth::id()
        // Por ahora usamos ID de sesión como ejemplo
        $userId = session('usuario_id');
        
        if (!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no autenticado'
            ], 401);
        }
        
        $activities = CompletedActivity::where('usuario_id', $userId)
            ->orderBy('completed_at', 'desc')
            ->get();
            
        return response()->json([
            'success' => true,
            'data' => $activities
        ]);
    }
    
    /**
     * Registrar una actividad como completada
     */
    public function completeActivity(Request $request)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'activity_type' => 'required|string|in:quiz,game,trivia,manualidades,historias',
            'activity_name' => 'required|string|max:255',
            'points' => 'required|integer|min:0'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        
        // En una implementación completa, usarías Auth::id()
        $userId = session('usuario_id');
        
        if (!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no autenticado'
            ], 401);
        }
        
        try {
            // Guardar la actividad completada
            $activity = CompletedActivity::create([
                'usuario_id' => $userId,
                'activity_type' => $request->input('activity_type'),
                'activity_name' => $request->input('activity_name'),
                'points' => $request->input('points'),
                'completed_at' => now()
            ]);
            
            // Actualizar el ranking
            Ranking::updateOrInsert(
                ['usuario_id' => $userId],
                [
                    'total_points' => \DB::raw('total_points + ' . $request->input('points')),
                    'updated_at' => now()
                ]
            );
            
            return response()->json([
                'success' => true,
                'message' => 'Actividad completada con éxito',
                'data' => $activity
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al registrar la actividad',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Obtener el progreso general del usuario
     */
    public function getProgress()
    {
        $userId = session('usuario_id');
        
        if (!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no autenticado'
            ], 401);
        }
        
        // Obtener puntos totales
        $ranking = Ranking::where('usuario_id', $userId)->first();
        $totalPoints = $ranking ? $ranking->total_points : 0;
        
        // Calcular actividades completadas
        $activitiesCount = CompletedActivity::where('usuario_id', $userId)->count();
        
        // Calcular distribución por tipo
        $distribution = CompletedActivity::where('usuario_id', $userId)
            ->select('activity_type', \DB::raw('count(*) as count'))
            ->groupBy('activity_type')
            ->get()
            ->pluck('count', 'activity_type')
            ->toArray();
            
        // Actividad más reciente
        $latestActivity = CompletedActivity::where('usuario_id', $userId)
            ->orderBy('completed_at', 'desc')
            ->first();
            
        return response()->json([
            'success' => true,
            'data' => [
                'total_points' => $totalPoints,
                'activities_completed' => $activitiesCount,
                'type_distribution' => $distribution,
                'latest_activity' => $latestActivity
            ]
        ]);
    }
    
    /**
     * Obtener los logros del usuario
     */
    public function getAchievements()
    {
        $userId = session('usuario_id');
        
        if (!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no autenticado'
            ], 401);
        }
        
        // Calcular logros (ficticio, podrías implementarlo según tu modelo de datos)
        $activitiesCount = CompletedActivity::where('usuario_id', $userId)->count();
        $totalPoints = Ranking::where('usuario_id', $userId)->value('total_points') ?? 0;
        
        $achievements = [
            [
                'id' => 'first_activity',
                'name' => 'Primera Actividad',
                'description' => 'Completar tu primera actividad',
                'icon' => 'medal',
                'unlocked' => $activitiesCount > 0,
                'progress' => $activitiesCount > 0 ? 100 : 0
            ],
            [
                'id' => 'ten_activities',
                'name' => '10 Actividades',
                'description' => 'Completar 10 actividades en total',
                'icon' => 'trophy',
                'unlocked' => $activitiesCount >= 10,
                'progress' => min(($activitiesCount / 10) * 100, 100)
            ],
            [
                'id' => 'hundred_points',
                'name' => '100 Puntos',
                'description' => 'Alcanzar los 100 puntos acumulados',
                'icon' => 'star',
                'unlocked' => $totalPoints >= 100,
                'progress' => min(($totalPoints / 100) * 100, 100)
            ]
        ];
        
        return response()->json([
            'success' => true,
            'data' => $achievements
        ]);
    }
}
<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompletedActivity;
use Illuminate\Support\Facades\DB;

class ActivitiesController extends Controller
{
    /**
     * Obtener listado de todas las actividades disponibles
     */
    public function index()
    {
        // Información ficticia de actividades (podrías adaptarlo para obtener datos desde DB)
        $activities = [
            [
                'id' => 1,
                'type' => 'quiz',
                'name' => 'Quiz de Naturaleza',
                'description' => 'Pon a prueba tus conocimientos sobre el medio ambiente',
                'points' => 10,
                'image_url' => url('/images/pregunta1.png')
            ],
            [
                'id' => 2,
                'type' => 'game',
                'name' => 'Juego de Memoria',
                'description' => 'Encuentra las parejas de imágenes relacionadas con el medio ambiente',
                'points' => 5,
                'image_url' => url('/images/cards/blank.png')
            ],
            [
                'id' => 3,
                'type' => 'trivia',
                'name' => 'Trivia General',
                'description' => 'Responde preguntas de trivia sobre diversos temas',
                'points' => 8,
                'image_url' => null
            ]
        ];

        return response()->json([
            'success' => true,
            'data' => $activities
        ]);
    }

    /**
     * Obtener información detallada de una actividad específica
     */
    public function show($id)
    {
        // En un caso real, buscarías la actividad en la base de datos
        // En este ejemplo uso actividades ficticias según el ID
        $activities = [
            1 => [
                'id' => 1,
                'type' => 'quiz',
                'name' => 'Quiz de Naturaleza',
                'description' => 'Pon a prueba tus conocimientos sobre el medio ambiente',
                'points' => 10,
                'content' => [
                    'questions' => [
                        [
                            'id' => 1,
                            'text' => '¿Qué deberíamos hacer con las botellas de plástico usadas?',
                            'options' => [
                                'a' => 'Tirarlas al contenedor general',
                                'b' => 'Reciclarlas',
                                'c' => 'Quemarlas'
                            ],
                            'correct_answer' => 'b'
                        ],
                        [
                            'id' => 2,
                            'text' => '¿Qué podemos hacer para reducir el volumen de una botella plástica antes de reciclarla?',
                            'options' => [
                                'a' => 'Dejarla como está',
                                'b' => 'Aplastarla',
                                'c' => 'Cortarla en pedazos pequeños'
                            ],
                            'correct_answer' => 'b'
                        ]
                    ]
                ]
            ],
            2 => [
                'id' => 2,
                'type' => 'game',
                'name' => 'Juego de Memoria',
                'description' => 'Encuentra las parejas de imágenes relacionadas con el medio ambiente',
                'points' => 5,
                'content' => [
                    'cards' => [
                        ['name' => 'recycle', 'img' => url('/images/cards/recycle.png')],
                        ['name' => 'earth', 'img' => url('/images/cards/earth.png')],
                        ['name' => 'plant', 'img' => url('/images/cards/plant.png')],
                        ['name' => 'water', 'img' => url('/images/cards/water.png')]
                    ]
                ]
            ]
        ];

        if (!isset($activities[$id])) {
            return response()->json([
                'success' => false,
                'message' => 'Actividad no encontrada'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $activities[$id]
        ]);
    }

    /**
     * Estadísticas globales de actividades
     */
    public function stats()
    {
        // Obtener estadísticas reales de la base de datos
        $stats = [
            'total_completed' => CompletedActivity::count(),
            'most_popular' => DB::table('completed_activities')
                ->select('activity_name', DB::raw('count(*) as count'))
                ->groupBy('activity_name')
                ->orderBy('count', 'desc')
                ->first(),
            'total_points_awarded' => CompletedActivity::sum('points')
        ];

        return response()->json([
            'success' => true,
            'data' => $stats
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Http;


class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        // Obtiene el comentario desde el request
        $comment = $request->input('comment');

        // Verifica si el comentario no está vacío
        if (!$comment) {
            return response()->json(['error' => 'El comentario no puede estar vacío.'], 400);
        }

        // Envía el comentario al servidor Flask
        $response = Http::post('http://127.0.0.1:5000/analyze', ['text' => $comment]);

        // Verifica si hubo error en la comunicación con Flask
        if ($response->failed()) {
            return response()->json(['error' => 'Error al comunicarse con Flask.'], 500);
        }

        // Obtiene el sentimiento analizado
        $sentiment = $response->json()['sentiment'];

        // Guarda en la base de datos
        $feedback = Feedback::create([
            'comment' => $comment,
            'sentiment' => $sentiment,
        ]);

        return response()->json(['message' => 'Comentario guardado', 'sentiment' => $sentiment]);
    }
}

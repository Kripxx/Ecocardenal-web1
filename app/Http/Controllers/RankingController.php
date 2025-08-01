<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;

class RankingController extends Controller
{
    public function index()
    {
        // Obtener rankings con los datos de los usuarios relacionados
        $rankings = Ranking::with('usuario')->orderBy('total_points', 'desc')->get();

        return view('progreso.ranking', compact('rankings'));
    }
}

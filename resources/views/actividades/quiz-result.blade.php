@extends('layouts.PlantillaBase')

@section('title', 'Resultados del Quiz')

@section('content')
<div class="container my-5">
    <div class="text-center">
       

        <div class="card mx-auto shadow-lg p-4" style="max-width: 600px;">
             <h2 class="display-4 mb-3 text-success">Resultados del Quiz</h2>
        <p class="lead mb-4 text-muted">¡Has terminado el quiz! Aquí están tus resultados:</p>
            <h3 class="fw-bold text-success">{{ $score }} / {{ $total }}</h3>

            @if($score === $total)
                <div class="alert alert-success mt-4" role="alert">
                    <h4 class="alert-heading">¡Excelente trabajo!</h4>
                    <p>Sabes mucho sobre el medio ambiente. ¡Sigue así!</p>
                </div>
            @elseif($score >= $total / 2)
                <div class="alert alert-warning mt-4" role="alert">
                    <h4 class="alert-heading">¡Buen intento!</h4>
                    <p>Estás en el camino correcto. Aún puedes aprender más sobre cómo cuidar la naturaleza.</p>
                </div>
            @else
                <div class="alert alert-danger mt-4" role="alert">
                    <h4 class="alert-heading">No te preocupes</h4>
                    <p>El aprendizaje es un proceso. Sigue practicando para mejorar tus conocimientos.</p>
                </div>
            @endif

            <a href="{{ route('progreso.activities') }}" class="btn btn-lg btn-success mt-4 shadow-sm hover-shadow-lg">
                <i class="bi bi-arrow-return-left me-2 "></i>Ver Actividades Completadas
            </a>
        </div>
    </div>
</div>
@endsection

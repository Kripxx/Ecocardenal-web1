@extends('layouts.PlantillaBase')

@section('title', 'Trivia - Resultados')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h2 class="mb-0 text-center">Resultados del Quiz</h2>
                </div>
                <div class="card-body">
                    <div class="text-center mb-5">
                        <div class="result-circle mb-3">
                            <div class="result-score">{{ $score }}/{{ count($questions) }}</div>
                            <div class="result-percentage">{{ $percentage }}%</div>
                        </div>
                        
                        @if($percentage >= 80)
                            <h3 class="text-success">¡Excelente trabajo!</h3>
                            <p>Tienes un gran conocimiento sobre este tema.</p>
                        @elseif($percentage >= 60)
                            <h3 class="text-primary">¡Buen trabajo!</h3>
                            <p>Tienes un buen conocimiento, pero aún puedes mejorar.</p>
                        @elseif($percentage >= 40)
                            <h3 class="text-warning">Resultado Promedio</h3>
                            <p>Aún puedes mejorar tus conocimientos en este tema.</p>
                        @else
                            <h3 class="text-danger">Sigue intentando</h3>
                            <p>¡No te rindas! Cada intento es una oportunidad para aprender.</p>
                        @endif
                    </div>
                    
                    <h3 class="mb-4">Revisión de Preguntas</h3>
                    
                    @foreach($results as $index => $result)
                        <div class="card mb-4 {{ $result['is_correct'] ? 'border-success' : 'border-danger' }}">
                            <div class="card-header {{ $result['is_correct'] ? 'bg-success text-white' : 'bg-danger text-white' }}">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Pregunta {{ $index + 1 }}</h5>
                                    <span class="badge bg-light text-dark">
                                        {{ $result['is_correct'] ? '✓ Correcta' : '✗ Incorrecta' }}
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mb-3">{!! $result['question'] !!}</h5>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"><strong>Tu respuesta:</strong></label>
                                            <div class="p-2 rounded {{ $result['is_correct'] ? 'bg-success bg-opacity-10' : 'bg-danger bg-opacity-10' }}">
                                                {!! $result['user_answer'] ?? '<em>Sin respuesta</em>' !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"><strong>Respuesta correcta:</strong></label>
                                            <div class="p-2 rounded bg-success bg-opacity-10">
                                                {!! $result['correct_answer'] !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <a href="{{ route('trivia.index') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-home me-2"></i> Volver al Inicio
                        </a>
                        <a href="{{ route('trivia.generate') }}?amount={{ count($questions) }}" class="btn btn-success btn-lg">
                            <i class="fas fa-redo me-2"></i> Nuevo Quiz
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .result-circle {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: linear-gradient(to right, #28a745, #20c997);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    
    .result-score {
        font-size: 24px;
        font-weight: bold;
    }
    
    .result-percentage {
        font-size: 36px;
        font-weight: bold;
    }
</style>
@endsection
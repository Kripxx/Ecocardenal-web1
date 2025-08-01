@extends('layouts.PlantillaBase')

@section('title', 'Metas')

@section('content')
<div class="section container py-5 bg-light rounded shadow-sm" style="max-width: 900px; margin: 0 auto;">
    <h2 class="text-center mb-4">Mis Metas</h2>
    
    <!-- Resumen de progreso -->
    <div class="progress-summary mb-4 p-3 bg-white rounded shadow-sm text-center">
        <h4 class="mb-3">
            <i class="fas fa-bullseye"></i> 
            {{ $metasCompletadas }} de {{ $totalMetas }} metas completadas
        </h4>
        <div class="progress" style="height: 20px;">
            <div class="progress-bar progress-bar-striped bg-primary" 
                 role="progressbar" 
                 style="width: {{ $totalMetas > 0 ? round(($metasCompletadas/$totalMetas)*100) : 0 }}%" 
                 aria-valuenow="{{ $metasCompletadas }}" 
                 aria-valuemin="0" 
                 aria-valuemax="{{ $totalMetas }}">
            </div>
        </div>
        <small class="text-muted">
            {{ $totalMetas > 0 ? round(($metasCompletadas/$totalMetas)*100) : 0 }}% de todas las metas
        </small>
    </div>

    <!-- Lista de metas -->
    <div class="goals-container">
        @forelse($metas as $meta)
            <div class="goal card shadow-sm mb-4 border-{{ $meta['completada'] ? 'success' : 'primary' }}">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="card-title mb-0">
                            <strong>{{ $meta['nombre'] }}</strong>
                            @if($meta['completada'])
                                <span class="badge bg-success ms-2">
                                    <i class="fas fa-check"></i> Completada
                                </span>
                            @endif
                        </h5>
                        <span class="badge bg-primary">
                            {{ $meta['puntos'] }} pts
                        </span>
                    </div>
                    
                    <p class="card-text">{{ $meta['descripcion'] }}</p>
                    
                    <div class="progress mb-2" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped {{ $meta['completada'] ? 'bg-success' : '' }}" 
                             role="progressbar" 
                             style="width: {{ $meta['porcentaje'] }}%" 
                             aria-valuenow="{{ $meta['actual'] }}" 
                             aria-valuemin="0" 
                             aria-valuemax="{{ $meta['objetivo'] }}">
                            {{ $meta['porcentaje'] }}%
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">
                            {{ $meta['actual'] }}/{{ $meta['objetivo'] }}
                        </small>
                        @if($meta['completada'])
                            <small class="text-success">
                                <i class="fas fa-trophy"></i> ¡Objetivo alcanzado!
                            </small>
                        @else
                            <small class="text-primary">
                                Faltan {{ $meta['objetivo'] - $meta['actual'] }}
                            </small>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center">
                No hay metas disponibles actualmente
            </div>
        @endforelse
    </div>

    <!-- Botón de regreso -->
    <div class="text-center mt-4">
        <a href="{{ route('progreso') }}" class="btn btn-success px-4 py-2">
            <i class="fas fa-arrow-left"></i> Volver al Progreso
        </a>
    </div>
</div>

<style>
    .goal {
        transition: all 0.3s ease;
    }
    .goal:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .progress-bar {
        transition: width 1s ease-in-out;
    }
</style>
@endsection
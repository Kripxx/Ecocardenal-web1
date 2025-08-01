@extends('layouts.PlantillaBase')

@section('title', 'Logros')

@section('content')
<div class="section container py-5 bg-light shadow-sm rounded" style="max-width: 900px; margin: 0 auto;">
    <h2 class="text-center mb-4">Logros Obtenidos</h2>
    <p class="text-center mb-5">¡Felicitaciones! Estos son los logros que has desbloqueado.</p>
    
    <!-- Resumen de progreso -->
    @isset($totalLogros)
    <div class="progress-summary mb-5 text-center">
        <div class="progress-container bg-white p-3 rounded shadow-sm">
            <h4>
                <i class="fas fa-trophy"></i> 
                {{ $logrosDesbloqueados ?? 0 }} de {{ $totalLogros }} logros desbloqueados
            </h4>
            <div class="progress mt-2" style="height: 20px;">
                <div class="progress-bar progress-bar-striped bg-success" 
                     role="progressbar" 
                     style="width: {{ $totalLogros > 0 ? round((($logrosDesbloqueados ?? 0)/$totalLogros)*100) : 0 }}%" 
                     aria-valuenow="{{ $logrosDesbloqueados ?? 0 }}" 
                     aria-valuemin="0" 
                     aria-valuemax="{{ $totalLogros }}">
                </div>
            </div>
            <small class="text-muted">
                {{ $totalLogros > 0 ? round((($logrosDesbloqueados ?? 0)/$totalLogros)*100) : 0 }}% completado
            </small>
        </div>
    </div>
    @endisset

    <!-- Lista de logros -->
    <div class="achievements-container row justify-content-center">
        @forelse($logros ?? [] as $logro)
            @php
                $desbloqueado = $logro['desbloqueado'] ?? false;
            @endphp
            <div class="achievement col-md-4 mb-4 text-center p-4 rounded shadow-sm 
                {{ $desbloqueado ? 'bg-white border-success' : 'bg-light border-secondary' }}">
                
                <div class="achievement-icon mb-3">
                    <i class="fas {{ $logro['icono'] ?? 'fa-certificate' }} fa-4x 
                        {{ !$desbloqueado ? 'grayscale' : '' }}"></i>
                </div>
                
                <h5 class="{{ $desbloqueado ? 'text-dark' : 'text-muted' }}">
                    <strong>{{ $logro['nombre'] ?? 'Logro' }}</strong>
                </h5>
                
                <p class="{{ $desbloqueado ? 'text-dark' : 'text-muted' }}">
                    {{ $logro['descripcion'] ?? 'Descripción del logro' }}
                </p>
                
                @if($desbloqueado)
                    <span class="badge bg-success">
                        <i class="fas fa-check"></i> Desbloqueado
                    </span>
                @else
                    <span class="badge bg-secondary">
                        <i class="fas fa-lock"></i> Bloqueado
                    </span>
                @endif
            </div>
        @empty
            <div class="col-12 text-center py-4">
                <div class="alert alert-info">
                    No se encontraron logros disponibles
                </div>
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
    .achievement {
        transition: all 0.3s ease;
    }
    .achievement:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .grayscale {
        filter: grayscale(100%);
        opacity: 0.6;
    }
    .text-gold {
        color: #FFD700;
    }
    .border-success {
        border: 2px solid #28a745 !important;
    }
    .border-secondary {
        border: 2px solid #6c757d !important;
    }
    .progress-container {
        max-width: 500px;
        margin: 0 auto;
    }
</style>
@endsection
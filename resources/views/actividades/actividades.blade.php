@extends('layouts.PlantillaBase')

@section('title', 'Actividades')

@section('content')
<div class="container py-5 bg-light rounded-3 shadow-sm">
    <h2 class="text-center mb-4 text-success">Actividades</h2>
    
    <!-- Lista de opciones -->
    <ul class="list-unstyled row row-cols-1 row-cols-md-2 g-4">
        <li class="col">
            <a href="{{ route('quiz.index') }}" class="d-flex align-items-center p-3 border rounded-3 shadow-sm bg-white text-dark text-decoration-none hover-shadow">
                <i class="fas fa-question-circle fa-2x me-3"></i>
                <span>Realiza un Quiz</span>
            </a>
        </li>
        <li class="col">
            <a href="{{ route('juego.index') }}" class="d-flex align-items-center p-3 border rounded-3 shadow-sm bg-white text-dark text-decoration-none hover-shadow">
                <i class="fas fa-gamepad fa-2x me-3"></i>
                <span>Juega un Juego</span>
            </a>
        </li>
        <li class="col">
            <a href="{{ route('manualidades.index') }}" class="d-flex align-items-center p-3 border rounded-3 shadow-sm bg-white text-dark text-decoration-none hover-shadow">
                <i class="fas fa-paint-brush fa-2x me-3"></i>
                <span>Manualidades</span>
            </a>
        </li>
        <li class="col">
            <a href="{{ route('historias.index') }}" class="d-flex align-items-center p-3 border rounded-3 shadow-sm bg-white text-dark text-decoration-none hover-shadow">
                <i class="fas fa-book fa-2x me-3"></i>
                <span>Historias</span>
            </a>
        </li>
    </ul>

    <!-- Imagen con fondo blanco -->
    <div class="text-center mt-4 p-4 rounded-3 shadow-sm bg-white">
    <img src="{{ asset('images/mascota-tortuga.png') }}" 
         alt="Mascota Tortuga" 
         style="filter: drop-shadow(0px 0px 10px rgba(0, 0, 0, 0.5)); max-width: 200px; height: auto;">
</div>

    <!-- Enlace de vuelta al menú -->
    <div class="text-center mt-4">
        <a href="{{ route('index') }}" class="btn btn-success btn-lg">Volver al Menú Principal</a>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Efecto de hover para los enlaces */
    .hover-shadow:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    /* Estilo para el contenedor de imagen */
    .img-fluid {
        transition: transform 0.3s ease;
    }
    .img-fluid:hover {
        transform: scale(1.05);
    }
</style>
@endpush

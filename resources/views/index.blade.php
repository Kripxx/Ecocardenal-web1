@extends('layouts.PlantillaBase')

@section('title', 'Página de Hábitos')

@section('content')
<div class="container py-5">
    <div class="row g-4"> 
        <!-- Novedades Section -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100"> 
                <div class="card-header bg-success text-white text-center">
                    <h5 class="mb-0">NOVEDADES</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><i class="fas fa-bullhorn"></i> ¡Nueva actualización de la web con nuevas actividades!</li>
                        <li><i class="fas fa-thumbs-up"></i> ¡Ahora tenemos página de Facebook! Ve a seguirnos</li>
                        <li><i class="fas fa-smile"></i> No olviden seguirnos en nuestras redes sociales</li>
                    </ul>
                    <div class="text-center">
                        <!-- Reducir el tamaño de la imagen -->
                        <img src="{{ asset('images/nino-feliz.png') }}" alt="Niño feliz"  style="max-width: 50%; height: auto; filter: drop-shadow(0px 0px 10px rgba(0, 0, 0, 0.5));">
                        </div>
                </div>
            </div>
        </div>

        <!-- Recomendaciones Section -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100"> <!-- Hacer que la tarjeta tenga la misma altura -->
                <div class="card-header bg-success text-white text-center">
                    <h5 class="mb-0">RECOMENDACIONES</h5>
                </div>
                <div class="card-body">
                    <p><i class="fas fa-chart-line"></i> Cumple tus objetivos diarios para ganar puntos y subir en el ranking semanal</p>
                    <a href="{{ route('ranking.index') }}" class="btn btn-outline-primary">IR AHÍ</a>
                    <p class="mt-3"><i class="fas fa-lightbulb"></i> No olvides desconectar los dispositivos electrónicos mientras no los uses, recuerda que consumen energía aunque estén apagados.</p>
                    <div class="text-center">
                        <!-- Reducir el tamaño de la imagen -->
                        <img src="{{ asset('images/animal-amigable.png') }}" alt="Animal amigable" style="max-width: 50%; height: auto; filter: drop-shadow(0px 0px 10px rgba(0, 0, 0, 0.5));">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('exito'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Bienvenido/a!',
            text: '{{ session('exito') }}',
            imageUrl: "{{ asset('images/like.png') }}", 
            imageWidth: 100,
            imageHeight: 100,
            imageAlt: 'Inicio exitoso',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif
@endsection

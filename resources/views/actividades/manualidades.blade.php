@extends('layouts.PlantillaBase')

@section('content')
    <div class="container py-5">
        <div class="bg-light rounded-3 shadow-sm p-4 mb-5">
            <div class="text-center mb-4">
                <h1 class="display-4 fw-bold text-success">Manualidades Reciclables</h1>
                <p class="lead text-muted">Descubre cómo reutilizar materiales reciclables para crear objetos útiles y divertidos.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <!-- Alcancía con Botellas de Plástico -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 rounded-4 overflow-hidden shadow hover-shadow">
                <div class="position-relative">
                    <img src="{{ asset('images/manualidades/alcancia.jpg') }}" class="card-img-top" alt="Alcancía con Botellas de Plástico">
                    <div class="position-absolute top-0 start-0 bg-success text-white px-3 py-2 rounded-bottom-end">
                        <i class="fas fa-recycle me-1"></i> Nivel Fácil
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-success fw-bold">1. Alcancía con Botellas de Plástico</h5>
                    <p class="card-text">Transforma una botella de plástico en una práctica alcancía para ahorrar monedas.</p>
                    <div class="bg-light p-3 rounded-3 mb-3">
                        <h6 class="fw-bold text-success"><i class="fas fa-tools me-2"></i>Materiales:</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent border-0 py-1"><i class="fas fa-check-circle text-success me-2"></i>1 botella de plástico</li>
                            <li class="list-group-item bg-transparent border-0 py-1"><i class="fas fa-check-circle text-success me-2"></i>Pintura acrílica (opcional)</li>
                            <li class="list-group-item bg-transparent border-0 py-1"><i class="fas fa-check-circle text-success me-2"></i>Tijeras</li>
                            <li class="list-group-item bg-transparent border-0 py-1"><i class="fas fa-check-circle text-success me-2"></i>Cutter</li>
                        </ul>
                    </div>
                    <div class="bg-light p-3 rounded-3">
                        <h6 class="fw-bold text-success"><i class="fas fa-list-ol me-2"></i>Pasos:</h6>
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item bg-transparent border-0 py-1">Recorta la parte superior de la botella para hacer una abertura donde caerán las monedas.</li>
                            <li class="list-group-item bg-transparent border-0 py-1">Decora la botella con pintura y otros materiales.</li>
                            <li class="list-group-item bg-transparent border-0 py-1">Asegúrate de que la abertura sea lo suficientemente grande para insertar monedas fácilmente.</li>
                        </ol>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between pt-0">
                    <a href="https://www.youtube.com/watch?v=ZDhyrfD3pVI" class="btn btn-outline-primary" target="_blank">
                        <i class="fab fa-youtube me-2"></i>Ver vídeo
                    </a>
                    <form action="{{ route('manualidades.completar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="manualidad_id" value="1">
                        <input type="hidden" name="nombre_manualidad" value="Alcancía con Botellas de Plástico">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check-circle me-2"></i>¡Completé esta manualidad!
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Macetas con Latas de Aluminio -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 rounded-4 overflow-hidden shadow hover-shadow">
                <div class="position-relative">
                    <img src="{{ asset('images/manualidades/macetas.jpg') }}" class="card-img-top" alt="Macetas con Latas de Aluminio">
                    <div class="position-absolute top-0 start-0 bg-warning text-white px-3 py-2 rounded-bottom-end">
                        <i class="fas fa-recycle me-1"></i> Nivel Medio
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-success fw-bold">2. Macetas con Latas de Aluminio</h5>
                    <p class="card-text">Crea una maceta única a partir de latas contaminantes en desuso.</p>
                    <div class="bg-light p-3 rounded-3 mb-3">
                        <h6 class="fw-bold text-success"><i class="fas fa-tools me-2"></i>Materiales:</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent border-0 py-1"><i class="fas fa-check-circle text-success me-2"></i>Lata de aluminio</li>
                            <li class="list-group-item bg-transparent border-0 py-1"><i class="fas fa-check-circle text-success me-2"></i>Pintura en aerosol</li>
                            <li class="list-group-item bg-transparent border-0 py-1"><i class="fas fa-check-circle text-success me-2"></i>Tierra y una planta pequeña</li>
                            <li class="list-group-item bg-transparent border-0 py-1"><i class="fas fa-check-circle text-success me-2"></i>Piedras pequeñas para el drenaje</li>
                        </ul>
                    </div>
                    <div class="bg-light p-3 rounded-3">
                        <h6 class="fw-bold text-success"><i class="fas fa-list-ol me-2"></i>Pasos:</h6>
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item bg-transparent border-0 py-1">Lava perfectamente la lata y seca bien.</li>
                            <li class="list-group-item bg-transparent border-0 py-1">Pinta la lata del color de tu preferencia.</li>
                            <li class="list-group-item bg-transparent border-0 py-1">Coloca piedras pequeñas en el fondo para el drenaje.</li>
                            <li class="list-group-item bg-transparent border-0 py-1">Llena la lata con tierra y planta tu planta favorita.</li>
                        </ol>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between pt-0">
                    <a href="https://www.youtube.com/watch?v=QRcBMVNE1z4" class="btn btn-outline-primary" target="_blank">
                        <i class="fab fa-youtube me-2"></i>Ver vídeo
                    </a>
                    <form action="{{ route('manualidades.completar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="manualidad_id" value="2">
                        <input type="hidden" name="nombre_manualidad" value="Macetas con Latas de Aluminio">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check-circle me-2"></i>¡Completé esta manualidad!
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Lámpara con Cartón y Papel -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 rounded-4 overflow-hidden shadow hover-shadow">
                <div class="position-relative">
                    <img src="{{ asset('images/manualidades/lampara.jpg') }}" class="card-img-top" alt="Lámpara con Cartón y Papel">
                    <div class="position-absolute top-0 start-0 bg-danger text-white px-3 py-2 rounded-bottom-end">
                        <i class="fas fa-recycle me-1"></i> Nivel Avanzado
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-success fw-bold">3. Lámpara con Cartón y Papel</h5>
                    <p class="card-text">Crea una lámpara original y ecológica con cartón y papel reciclado.</p>
                    <div class="bg-light p-3 rounded-3 mb-3">
                        <h6 class="fw-bold text-success"><i class="fas fa-tools me-2"></i>Materiales:</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent border-0 py-1"><i class="fas fa-check-circle text-success me-2"></i>Cartón reciclado</li>
                            <li class="list-group-item bg-transparent border-0 py-1"><i class="fas fa-check-circle text-success me-2"></i>Papel decorativo reciclado</li>
                            <li class="list-group-item bg-transparent border-0 py-1"><i class="fas fa-check-circle text-success me-2"></i>Tijeras o cúter</li>
                            <li class="list-group-item bg-transparent border-0 py-1"><i class="fas fa-check-circle text-success me-2"></i>Pegamento</li>
                            <li class="list-group-item bg-transparent border-0 py-1"><i class="fas fa-check-circle text-success me-2"></i>Una luz LED</li>
                        </ul>
                    </div>
                    <div class="bg-light p-3 rounded-3">
                        <h6 class="fw-bold text-success"><i class="fas fa-list-ol me-2"></i>Pasos:</h6>
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item bg-transparent border-0 py-1">Recorta el cartón en forma de base y estructura de la lámpara.</li>
                            <li class="list-group-item bg-transparent border-0 py-1">Pega el papel decorativo sobre el cartón para darle color.</li>
                            <li class="list-group-item bg-transparent border-0 py-1">Ensambla la estructura y coloca la luz LED en el interior.</li>
                        </ol>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-between pt-0">
                    <a href="https://www.youtube.com/watch?v=GwujtQajDy4&list=PL8Z2847EZSQpoWoa7kWCnqUi_MAgP8OHw" class="btn btn-outline-primary" target="_blank">
                        <i class="fab fa-youtube me-2"></i>Ver vídeo
                    </a>
                    <form action="{{ route('manualidades.completar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="manualidad_id" value="3">
                        <input type="hidden" name="nombre_manualidad" value="Lámpara con Cartón y Papel">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check-circle me-2"></i>¡Completé esta manualidad!
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5 mb-3">
        <a href="{{ route('actividades') }}" class="btn btn-success btn-lg rounded-pill shadow-sm">
            <i class="fas fa-arrow-left me-2"></i>Volver a Actividades
        </a>
    </div>
    

</div>

<link rel="stylesheet" href="{{ asset('css/manualidades.css') }}">

@endsection

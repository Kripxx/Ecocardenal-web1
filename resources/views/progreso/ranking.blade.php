@extends('layouts.PlantillaBase')

@section('title', 'Ranking de Usuarios')

@section('content')
<div class="container py-5">
    <div class="main-content">
        <h2 class="text-center text-primary font-weight-bold mb-4">Ranking de Usuarios</h2>
        <p class="text-center text-muted mb-5">Consulta los puntajes acumulados por los usuarios y sus logros.</p>

        <!-- Imagen ilustrativa encima de la tabla -->
        <div class="image-container mb-4 text-center">
            <img src="{{ asset('images/trophy.png') }}" alt="Tortuga con trofeo" class="illustration-img shadow-lg rounded-circle">
        </div>

        <!-- Tabla de ranking -->
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped shadow-lg rounded-lg">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Puntos Totales</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rankings as $index => $ranking)
                        <tr class="hover-table-row">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $ranking->usuario->nombreUsuario }}</td>
                            <td>{{ $ranking->total_points }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('progreso') }}" class="btn btn-outline-primary btn-lg shadow-lg">Volver a Progreso</a>
        </div>
    </div>
</div>

<style>
    /* Estilo general para el contenido principal */
    .main-content {
        background-color: #ffffff; /* Fondo blanco para el div principal */
        padding: 30px;
        border-radius: 15px; /* Bordes redondeados */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Sombra sutil para dar profundidad */
        max-width: 1100px;
        margin: 0 auto;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Estilo de la tabla */
    .table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 1.1rem;
    }

    .table th, .table td {
        border: 1px solid #ddd;
        padding: 15px;
        text-align: center;
        vertical-align: middle;
    }

    .table th {
        background-color: #007bff;
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .table tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .table tr:nth-child(odd) {
        background-color: #e3f2fd;
    }

    .table tr:hover {
        background-color: #d1ecf1;
        transform: translateY(-2px);
        transition: all 0.3s ease;
    }

    .table td {
        font-size: 16px;
    }

    /* Imagen ilustrativa */
    .image-container {
        margin: 10px auto;
    }

    .illustration-img {
        width: 150px;
        height: auto;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .illustration-img:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    /* Estilo del enlace */
    .btn-outline-primary {
        font-size: 1.1rem;
        padding: 12px 30px;
        border-radius: 30px;
        border: 2px solid #007bff;
        color: #007bff;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    /* Fondo sutil en la tabla */
    .hover-table-row:hover {
        background-color: #d1ecf1;
        transform: scale(1.02);
        transition: transform 0.2s ease;
    }
</style>
@endsection

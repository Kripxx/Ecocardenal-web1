@extends('layouts.PlantillaBase')

@section('title', 'Página de Hábitos')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
   

            <!-- Mensajes de éxito o error -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Formulario de actualización -->
            <form action="{{ route('ActualizarUsuario', ['id' => session('usuario_id')]) }}" method="POST" id="updateForm" class="bg-light p-4 rounded-3 shadow-sm">
                @csrf
                @method('PUT')

                <!-- Campo Nombre de Usuario -->
                <div class="mb-4">
                    <h2 class="text-center text-success mb-4">Actualizar Información de Usuario</h2>
                    <label for="nombreUsuario" class="form-label">Nuevo Nombre de Usuario</label>
                    <input type="text" class="form-control @error('nombreUsuario') is-invalid @enderror" id="nombreUsuario" name="nombreUsuario" value="{{ session('nombreUsuario') }}" required>
                    <div class="invalid-feedback">
                        El nombre de usuario es obligatorio.
                    </div>
                    @error('nombreUsuario')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botón de Enviar -->
                <button type="submit" class="btn btn-success w-100" id="submitBtn">Actualizar</button>
            </form>
            
            <!-- Mostrar los valores actuales -->
            <div class="mt-5 bg-white p-4 rounded-3 shadow-sm">
                <h3 class="mb-3">Valores Actuales:</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID Usuario</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Correo Electrónico</th>
                            <th scope="col">Nombre de Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ session('usuario_id') }}</td>
                            <td>{{ session('nombre') }}</td>
                            <td>{{ session('apellido') }}</td>
                            <td>{{ session('correo') }}</td>
                            <td>{{ session('nombreUsuario') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    /* Estilo para los mensajes de alerta */
    .alert {
        margin-bottom: 20px;
    }

    /* Mejorar apariencia del formulario */
    .form-control {
        transition: all 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color: #0062cc;
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
    }

    /* Estilo para el botón de enviar */
    #submitBtn {
        font-size: 1.1rem;
        padding: 12px;
    }

    /* Sombra en la tabla y bordes redondeados */
    table {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Fondo para la tabla */
    table th, table td {
        padding: 12px;
    }
</style>
@endpush

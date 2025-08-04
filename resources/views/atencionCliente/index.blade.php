
@extends('layouts.PlantillaBase')

@section('title', 'Atención al Cliente')

@section('content')
<div class="container py-4">
    <div class="text-center mb-4">
        <img src="{{ asset('images/animal-amigable.png') }}" alt="Tortuga ecológica" style="width: 80px;">
        <h2 class="text-success mt-3">Centro de Atención EcoCárdenla</h2>
        <p class="text-muted">¿Tienes dudas, sugerencias o quieres saludarnos? ¡Escríbenos!</p>
    </div>

    {{-- Alertas de éxito --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    {{-- Alertas de error general --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Por favor corrige los errores e inténtalo de nuevo.
        </div>
    @endif

    <div class="card shadow-sm border-success">
        <div class="card-body">
            <h5 class="card-title text-success">Formulario de Contacto</h5>

            <form action="{{ route('atencion.cliente.enviar') }}" method="POST">
                @csrf

                {{-- Motivo --}}
                <div class="mb-3">
                    <label for="motivo" class="form-label">Motivo de contacto:</label>
                    <select name="motivo" id="motivo" class="form-select text-success" required>
                        <option value="" disabled {{ old('motivo') ? '' : 'selected' }}>Selecciona una opción</option>
                        <option value="error" {{ old('motivo') == 'error' ? 'selected' : '' }}>Reportar un error</option>
                        <option value="sugerencia" {{ old('motivo') == 'sugerencia' ? 'selected' : '' }}>Sugerencia de juego nuevo</option>
                        <option value="felicitacion" {{ old('motivo') == 'felicitacion' ? 'selected' : '' }}>Felicitación o comentario</option>
                        <option value="cuenta" {{ old('motivo') == 'cuenta' ? 'selected' : '' }}>Problemas de cuenta</option>
                    </select>
                    @error('motivo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Mensaje --}}
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Tu mensaje:</label>
                    <textarea name="mensaje" id="mensaje" class="form-control" rows="4" placeholder="Describe tu problema o comentario aquí..." required>{{ old('mensaje') }}</textarea>
                    @error('mensaje')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Botón --}}
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-paper-plane me-1"></i> Enviar mensaje
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
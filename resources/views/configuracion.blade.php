@extends('layouts.PlantillaBase')

@section('title', 'Configuración')

@section('content')
<div class="section">
    <h2>Configuración</h2>
    <ul class="options-list">
        <li><i class="fas fa-user"></i> <strong>Ajuste de Perfil</strong>
            <p>Cambia tu nombre, foto de perfil, y otros detalles personales.</p>
        </li>
        <li><i class="fas fa-bell"></i> <strong>Notificaciones</strong>
            <p>Configura tus preferencias de notificaciones y alertas.</p>
        </li>
        <li><i class="fas fa-lock"></i> <strong>Privacidad</strong>
            <p>Ajusta tus configuraciones de privacidad y seguridad.</p>
        </li>
        <li><i class="fas fa-language"></i> <strong>Idioma</strong>
            <p>Selecciona el idioma en el que prefieres usar la aplicación.</p>
        </li>
        <li><i class="fas fa-info-circle"></i> <strong>Información de la Cuenta</strong>
            <p>Consulta información detallada sobre tu cuenta.</p>
    </ul>
    <div class="image-container small-margin">
        <img src="{{ asset('images/mascota-tortuga1.png') }}" alt="Mascota Tortuga">
    </div>
    <a href="{{ route('index') }}" class="back-link">Volver al Menú Principal</a>
</div>
@endsection

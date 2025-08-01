<!-- resources/views/api/tester.blade.php -->
@extends('layouts.PlantillaBase')

@section('title', 'API Tester')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0">EcoCardenal API Tester</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Esta herramienta te permite probar los endpoints de la API de Eco directamente desde el navegador.</p>

                    <div class="mb-4">
                        <h5>Ejemplos rápidos</h5>
                        <div class="btn-group mb-3">
                            <button type="button" class="btn btn-outline-success example-request" 
                                    data-method="GET" data-endpoint="/activities">
                                Obtener actividades
                            </button>
                            <button type="button" class="btn btn-outline-success example-request" 
                                    data-method="GET" data-endpoint="/activities/1">
                                Detalles de actividad
                            </button>
                            <button type="button" class="btn btn-outline-success example-request" 
                                    data-method="GET" data-endpoint="/activities/stats">
                                Estadísticas
                            </button>
                        </div>
                        
                        <div class="btn-group mb-3">
                            <button type="button" class="btn btn-outline-primary example-request" 
                                    data-method="POST" data-endpoint="/auth/login" 
                                    data-body='{"login": "usuario", "password": "contraseña"}'>
                                Iniciar sesión
                            </button>
                            <button type="button" class="btn btn-outline-primary example-request" 
                                    data-method="POST" data-endpoint="/auth/register" 
                                    data-body='{"nombreUsuario": "nuevo_usuario", "nombre": "Nombre", "apellido": "Apellido", "correo": "usuario@ejemplo.com", "password": "contraseña123"}'>
                                Registrarse
                            </button>
                        </div>
                    </div>

                    <form id="api-request-form">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="api-method" class="form-label">Método</label>
                                <select id="api-method" class="form-select">
                                    <option value="GET">GET</option>
                                    <option value="POST">POST</option>
                                    <option value="PUT">PUT</option>
                                    <option value="DELETE">DELETE</option>
                                </select>
                            </div>
                            <div class="col-md-9">
                                <label for="api-endpoint" class="form-label">Endpoint</label>
                                <div class="input-group">
                                    <span class="input-group-text">/api/v1</span>
                                    <input type="text" id="api-endpoint" class="form-control" placeholder="/activities">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="request-data" class="form-label">Datos de la solicitud (JSON)</label>
                            <textarea id="request-data" class="form-control" rows="5" placeholder='{"key": "value"}'></textarea>
                        </div>

                        <div class="mb-3">
                            <button type="button" id="send-request" class="btn btn-success">
                                <i class="bi bi-send"></i> Enviar solicitud
                            </button>
                        </div>
                    </form>

                    <div id="response-container" class="mt-4" style="display: none;">
                        <h5>Respuesta <span id="response-status" class="badge bg-secondary">Pendiente</span></h5>
                        <pre id="response-data" class="p-3 bg-light border rounded"></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts específicos para el API Tester -->
<script src="{{ asset('js/api-client.js') }}"></script>
<script src="{{ asset('js/api-tester.js') }}"></script>
@endsection
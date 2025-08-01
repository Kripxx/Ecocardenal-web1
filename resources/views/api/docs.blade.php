@extends('layouts.PlantillaBase')

@section('title', 'Documentación de la API')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3">
                <!-- Sidebar con índice -->
                <div class="bg-white p-4 rounded shadow-sm sticky-top" style="top: 6rem;">
                    <h5 class="text-success mb-3">Contenido</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#introduccion">Introducción</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#autenticacion">Autenticación</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#activities">Actividades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#progreso">Progreso del Usuario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#ranking">Ranking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sentiment">Análisis de Sentimiento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#errores">Manejo de Errores</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-9">
                <!-- Contenido principal -->
                <div class="bg-white p-5 rounded shadow-sm">
                    <h1 class="text-success mb-4">Documentación de la API de EcoCardenal</h1>

                    <section id="introduccion" class="mb-5">
                        <h2 class="mb-3">Introducción</h2>
                        <p>Esta API permite interactuar con el sistema de actividades ecológicas, gestionar el progreso del
                            usuario y consultar rankings.</p>

                        <h4>Base URL</h4>
                        <div class="bg-light p-3 mb-3 rounded">
                            <code>{{ url('/api/v1') }}</code>
                        </div>
                    </section>

                    <section id="autenticacion" class="mb-5">
                        <h2 class="mb-3">Autenticación</h2>
                        <p>La API utiliza Laravel Sanctum para autenticación mediante tokens. Debes incluir el token en las
                            cabeceras HTTP de las solicitudes:</p>

                        <div class="bg-light p-3 mb-4 rounded">
                            <code>Authorization: Bearer [tu_token]</code>
                        </div>

                        <h4 class="mt-4">Registro de usuario</h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="badge bg-success">POST</span>
                                <code>/auth/register</code>
                            </div>
                            <div class="card-body">
                                <h5>Parámetros:</h5>
                                <ul>
                                    <li><code>nombreUsuario</code>: Nombre de usuario único</li>
                                    <li><code>nombre</code>: Nombre real del usuario</li>
                                    <li><code>apellido</code>: Apellido del usuario</li>
                                    <li><code>correo</code>: Correo electrónico único</li>
                                    <li><code>password</code>: Contraseña (mínimo 8 caracteres)</li>
                                </ul>

                                <h5>Respuesta exitosa:</h5>
                                <pre><code class="language-json">{
      "success": true,
      "data": {
        "usuario": {
          "id": 1,
          "nombreUsuario": "eco_user",
          "nombre": "Juan",
          "apellido": "Pérez",
          "correo": "juan@ejemplo.com",
          "created_at": "2025-04-01T10:00:00.000000Z",
          "updated_at": "2025-04-01T10:00:00.000000Z"
        },
        "access_token": "1|LMPZxxxxxxxxxxxxxxxxxxxxxxxxxxx",
        "token_type": "Bearer"
      }
    }</code></pre>
                            </div>
                        </div>

                        <h4>Inicio de sesión</h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="badge bg-success">POST</span>
                                <code>/auth/login</code>
                            </div>
                            <div class="card-body">
                                <h5>Parámetros:</h5>
                                <ul>
                                    <li><code>login</code>: Nombre de usuario o correo electrónico</li>
                                    <li><code>password</code>: Contraseña</li>
                                </ul>

                                <h5>Respuesta exitosa:</h5>
                                <pre><code class="language-json">{
      "success": true,
      "data": {
        "usuario": {
          "id": 1,
          "nombreUsuario": "eco_user",
          "nombre": "Juan",
          "apellido": "Pérez",
          "correo": "juan@ejemplo.com"
        },
        "access_token": "1|LMPZxxxxxxxxxxxxxxxxxxxxxxxxxxx",
        "token_type": "Bearer"
      }
    }</code></pre>
                            </div>
                        </div>

                        <h4>Cerrar sesión</h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="badge bg-success">POST</span>
                                <code>/auth/logout</code>
                            </div>
                            <div class="card-body">
                                <h5>Descripción:</h5>
                                <p>Revoca el token de acceso actual. Requiere autenticación.</p>

                                <h5>Respuesta exitosa:</h5>
                                <pre><code class="language-json">{
      "success": true,
      "message": "Token revocado exitosamente"
    }</code></pre>
                            </div>
                        </div>

                        <h4>Información del usuario actual</h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">GET</span>
                                <code>/auth/me</code>
                            </div>
                            <div class="card-body">
                                <h5>Descripción:</h5>
                                <p>Obtiene la información del usuario autenticado. Requiere autenticación.</p>

                                <h5>Respuesta exitosa:</h5>
                                <pre><code class="language-json">{
      "success": true,
      "data": {
        "id": 1,
        "nombreUsuario": "eco_user",
        "nombre": "Juan",
        "apellido": "Pérez",
        "correo": "juan@ejemplo.com",
        "created_at": "2025-04-01T10:00:00.000000Z",
        "updated_at": "2025-04-01T10:00:00.000000Z"
      }
    }</code></pre>
                            </div>
                        </div>
                    </section>

                    <section id="activities" class="mb-5">
                        <h2 class="mb-3">Actividades</h2>

                        <h4>Listar todas las actividades disponibles</h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">GET</span>
                                <code>/activities</code>
                            </div>
                            <div class="card-body">
                                <h5>Respuesta exitosa:</h5>
                                <pre><code class="language-json">{
      "success": true,
      "data": [
        {
          "id": 1,
          "type": "quiz",
          "name": "Quiz de Naturaleza",
          "description": "Pon a prueba tus conocimientos sobre el medio ambiente",
          "points": 10,
          "image_url": "https://tudominio.com/images/pregunta1.png"
        },
        {
          "id": 2,
          "type": "game",
          "name": "Juego de Memoria",
          "description": "Encuentra las parejas de imágenes relacionadas con el medio ambiente",
          "points": 5,
          "image_url": "https://tudominio.com/images/cards/blank.png"
        }
      ]
    }</code></pre>
                            </div>
                        </div>

                        <h4>Obtener detalles de una actividad</h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">GET</span>
                                <code>/activities/{id}</code>
                            </div>
                            <div class="card-body">
                                <h5>Parámetros de URL:</h5>
                                <ul>
                                    <li><code>id</code>: ID de la actividad a consultar</li>
                                </ul>

                                <h5>Respuesta exitosa:</h5>
                                <pre><code class="language-json">{
      "success": true,
      "data": {
        "id": 1,
        "type": "quiz",
        "name": "Quiz de Naturaleza",
        "description": "Pon a prueba tus conocimientos sobre el medio ambiente",
        "points": 10,
        "content": {
          "questions": [
            {
              "id": 1,
              "text": "¿Qué deberíamos hacer con las botellas de plástico usadas?",
              "options": {
                "a": "Tirarlas al contenedor general",
                "b": "Reciclarlas",
                "c": "Quemarlas"
              },
              "correct_answer": "b"
            },
            {
              "id": 2,
              "text": "¿Qué podemos hacer para reducir el volumen de una botella plástica antes de reciclarla?",
              "options": {
                "a": "Dejarla como está",
                "b": "Aplastarla",
                "c": "Cortarla en pedazos pequeños"
              },
              "correct_answer": "b"
            }
          ]
        }
      }
    }</code></pre>
                            </div>
                        </div>

                        <h4>Obtener estadísticas de actividades</h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">GET</span>
                                <code>/activities/stats</code>
                            </div>
                            <div class="card-body">
                                <h5>Descripción:</h5>
                                <p>Obtiene estadísticas globales sobre las actividades completadas por los usuarios.</p>

                                <h5>Respuesta exitosa:</h5>
                                <pre><code class="language-json">{
      "success": true,
      "data": {
        "total_completed": 245,
        "most_popular": {
          "activity_name": "Quiz de Naturaleza",
          "count": 120
        },
        "total_points_awarded": 1850
      }
    }</code></pre>
                            </div>
                        </div>
                    </section>

                    <section id="progreso" class="mb-5">
                        <h2 class="mb-3">Progreso del Usuario</h2>

                        <h4>Obtener actividades completadas</h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">GET</span>
                                <code>/user/activities</code>
                            </div>
                            <div class="card-body">
                                <h5>Descripción:</h5>
                                <p>Obtiene las actividades completadas por el usuario autenticado. Requiere autenticación.
                                </p>

                                <h5>Respuesta exitosa:</h5>
                                <pre><code class="language-json">{
      "success": true,
      "data": [
        {
          "id": 15,
          "usuario_id": 1,
          "activity_type": "quiz",
          "activity_name": "Quiz de Naturaleza",
          "points": 8,
          "completed_at": "2025-04-01T14:35:12.000000Z"
        },
        {
          "id": 23,
          "usuario_id": 1,
          "activity_type": "game",
          "activity_name": "Juego de Memoria",
          "points": 5,
          "completed_at": "2025-04-02T10:20:45.000000Z"
        }
      ]
    }</code></pre>
                            </div>
                        </div>

                        <h4>Registrar actividad completada</h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="badge bg-success">POST</span>
                                <code>/user/activities/complete</code>
                            </div>
                            <div class="card-body">
                                <h5>Descripción:</h5>
                                <p>Registra una actividad como completada para el usuario autenticado. Requiere
                                    autenticación.</p>

                                <h5>Parámetros:</h5>
                                <ul>
                                    <li><code>activity_type</code>: Tipo de actividad (quiz, game, trivia, manualidades,
                                        historias)</li>
                                    <li><code>activity_name</code>: Nombre de la actividad</li>
                                    <li><code>points</code>: Puntos obtenidos al completar la actividad</li>
                                </ul>

                                <h5>Respuesta exitosa:</h5>
                                <pre><code class="language-json">{
      "success": true,
      "message": "Actividad completada con éxito",
      "data": {
        "id": 24,
        "usuario_id": 1,
        "activity_type": "quiz",
        "activity_name": "Quiz de Naturaleza",
        "points": 8,
        "completed_at": "2025-04-03T15:20:45.000000Z"
      }
    }</code></pre>
                            </div>
                        </div>

                        <h4>Obtener progreso general</h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">GET</span>
                                <code>/user/progress</code>
                            </div>
                            <div class="card-body">
                                <h5>Descripción:</h5>
                                <p>Obtiene el progreso general del usuario autenticado. Requiere autenticación.</p>

                                <h5>Respuesta exitosa:</h5>
                                <pre><code class="language-json">{
      "success": true,
      "data": {
        "total_points": 120,
        "activities_completed": 15,
        "type_distribution": {
          "quiz": 8,
          "game": 4,
          "trivia": 3
        },
        "latest_activity": {
          "id": 24,
          "activity_name": "Quiz de Naturaleza",
          "points": 8,
          "completed_at": "2025-04-03T15:20:45.000000Z"
        }
      }
    }</code></pre>
                            </div>
                        </div>

                        <h4>Obtener logros del usuario</h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">GET</span>
                                <code>/user/achievements</code>
                            </div>
                            <div class="card-body">
                                <h5>Descripción:</h5>
                                <p>Obtiene los logros del usuario autenticado. Requiere autenticación.</p>

                                <h5>Respuesta exitosa:</h5>
                                <pre><code class="language-json">{
      "success": true,
      "data": [
        {
          "id": "first_activity",
          "name": "Primera Actividad",
          "description": "Completar tu primera actividad",
          "icon": "medal",
          "unlocked": true,
          "progress": 100
        },
        {
          "id": "ten_activities",
          "name": "10 Actividades",
          "description": "Completar 10 actividades en total",
          "icon": "trophy",
          "unlocked": true,
          "progress": 100
        },
        {
          "id": "hundred_points",
          "name": "100 Puntos",
          "description": "Alcanzar los 100 puntos acumulados",
          "icon": "star",
          "unlocked": true,
          "progress": 100
        }
      ]
    }</code></pre>
                            </div>
                        </div>
                    </section>

                    <section id="ranking" class="mb-5">
                        <h2 class="mb-3">Ranking</h2>

                        <h4>Obtener ranking global</h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">GET</span>
                                <code>/ranking</code>
                            </div>
                            <div class="card-body">
                                <h5>Descripción:</h5>
                                <p>Obtiene el ranking global de usuarios ordenado por puntos.</p>

                                <h5>Respuesta exitosa:</h5>
                                <pre><code class="language-json">{
      "success": true,
      "data": [
        {
          "position": 1,
          "usuario": {
            "id": 5,
            "nombreUsuario": "eco_master"
          },
          "total_points": 450
        },
        {
          "position": 2,
          "usuario": {
            "id": 3,
            "nombreUsuario": "planeta_verde"
          },
          "total_points": 380
        },
        {
          "position": 3,
          "usuario": {
            "id": 7,
            "nombreUsuario": "eco_explorer"
          },
          "total_points": 320
        }
      ]
    }</code></pre>
                            </div>
                        </div>

                        <h4>Obtener los 3 primeros del ranking</h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">GET</span>
                                <code>/ranking/top</code>
                            </div>
                            <div class="card-body">
                                <h5>Descripción:</h5>
                                <p>Obtiene los tres primeros usuarios del ranking global.</p>

                                <h5>Respuesta exitosa:</h5>
                                <pre><code class="language-json">{
      "success": true,
      "data": [
        {
          "position": 1,
          "usuario": {
            "id": 5,
            "nombreUsuario": "eco_master"
          },
          "total_points": 450
        },
        {
          "position": 2,
          "usuario": {
            "id": 3,
            "nombreUsuario": "planeta_verde"
          },
          "total_points": 380
        },
        {
          "position": 3,
          "usuario": {
            "id": 7,
            "nombreUsuario": "eco_explorer"
          },
          "total_points": 320
        }
      ]
    }</code></pre>
                            </div>
                        </div>

                        <h4>Obtener la posición del usuario en el ranking</h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">GET</span>
                                <code>/ranking/me</code>
                            </div>
                            <div class="card-body">
                                <h5>Descripción:</h5>
                                <p>Obtiene la posición del usuario autenticado en el ranking global. Requiere autenticación.
                                </p>

                                <h5>Respuesta exitosa:</h5>
                                <pre><code class="language-json">{
      "success": true,
      "data": {
        "position": 8,
        "usuario": {
          "id": 1,
          "nombreUsuario": "eco_user"
        },
        "total_points": 120,
        "next_position": {
          "position": 7,
          "points_difference": 15
        }
      }
    }</code></pre>
                            </div>
                        </div>
                    </section>

                    <section id="sentiment" class="mb-5">
                        <h2 class="mb-3">Análisis de Sentimiento</h2>

                        <h4>Analizar comentario</h4>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="badge bg-success">POST</span>
                                <code>/sentiment-analysis</code>
                            </div>
                            <div class="card-body">
                                <h5>Descripción:</h5>
                                <p>Analiza el sentimiento de un comentario de texto y guarda el resultado.</p>

                                <h5>Parámetros:</h5>
                                <ul>
                                    <li><code>comment</code>: Texto del comentario a analizar</li>
                                </ul>

                                <h5>Respuesta exitosa:</h5>
                                <pre><code class="language-json">{
      "message": "Comentario guardado",
      "sentiment": "positive"
    }</code></pre>

                                <h5>Posibles valores de sentimiento:</h5>
                                <ul>
                                    <li><code>positive</code>: Sentimiento positivo</li>
                                    <li><code>negative</code>: Sentimiento negativo</li>
                                    <li><code>neutral</code>: Sentimiento neutral</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section id="errores" class="mb-5">
                        <h2 class="mb-3">Manejo de Errores</h2>

                        <h4>Códigos de estado HTTP</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Código</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>200</td>
                                        <td>Éxito. La solicitud se completó correctamente.</td>
                                    </tr>
                                    <tr>
                                        <td>400</td>
                                        <td>Solicitud incorrecta. La solicitud contiene sintaxis errónea.</td>
                                    </tr>
                                    <tr>
                                        <td>401</td>
                                        <td>No autorizado. La solicitud requiere autenticación.</td>
                                    </tr>
                                    <tr>
                                        <td>403</td>
                                        <td>Prohibido. El servidor entendió la solicitud, pero se niega a autorizarla.</td>
                                    </tr>
                                    <tr>
                                        <td>404</td>
                                        <td>No encontrado. El recurso solicitado no existe.</td>
                                    </tr>
                                    <tr>
                                        <td>422</td>
                                        <td>Entidad no procesable. La solicitud está bien formada pero contiene errores
                                            semánticos.</td>
                                    </tr>
                                    <tr>
                                        <td>500</td>
                                        <td>Error interno del servidor. El servidor encontró una situación inesperada.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h4 class="mt-4">Formato de errores</h4>
                        <p>Cuando ocurre un error, la API responde con un objeto JSON con esta estructura:</p>
                        <pre><code class="language-json">{
      "success": false,
      "message": "Descripción del error",
      "errors": {
        "campo1": [
          "Error de validación para campo1"
        ],
        "campo2": [
          "Error de validación para campo2"
        ]
      }
    }</code></pre>
                        <p class="text-muted">El campo <code>errors</code> solo está presente en errores de validación
                            (código 422).</p>

                        <h4 class="mt-4">Ejemplos de errores comunes</h4>

                        <h5>Error de validación (422)</h5>
                        <pre><code class="language-json">{
      "success": false,
      "message": "Los datos proporcionados son inválidos.",
      "errors": {
        "nombreUsuario": [
          "El nombre de usuario ya ha sido registrado."
        ],
        "password": [
          "La contraseña debe tener al menos 8 caracteres."
        ]
      }
    }</code></pre>

                        <h5>Error de autenticación (401)</h5>
                        <pre><code class="language-json">{
      "success": false,
      "message": "Las credenciales proporcionadas son incorrectas"
    }</code></pre>

                        <h5>Recurso no encontrado (404)</h5>
                        <pre><code class="language-json">{
      "success": false,
      "message": "Actividad no encontrada"
    }</code></pre>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/themes/prism.min.css">
    <style>
        pre {
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }

        code {
            font-family: 'Source Code Pro', monospace;
            font-size: 14px;
        }

        .sticky-top {
            z-index: 100;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/components/prism-json.min.js"></script>
@endpush
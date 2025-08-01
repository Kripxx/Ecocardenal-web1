@extends('layouts.PlantillaBase')

@section('title', 'Trivia - Quiz')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Quiz de Trivia</h2>
                        <div class="translate-container">
                            <div id="google_translate_element"></div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-4 text-center">
                        <span class="badge bg-info text-dark p-2 fs-6">{{ $amount }} preguntas</span>
                        <span class="badge bg-primary p-2 fs-6">{{ $category }}</span>
                        @if($difficulty != 'Any')
                            <span class="badge bg-{{ $difficulty == 'easy' ? 'success' : ($difficulty == 'medium' ? 'warning' : 'danger') }} p-2 fs-6">
                                {{ $difficulty }}
                            </span>
                        @endif
                    </div>
                    
                    <div class="alert alert-info d-flex align-items-center mb-4">
                        <i class="fas fa-language me-3 fa-lg"></i>
                        <div>
                            <strong>¿Preguntas en inglés?</strong> Utiliza el selector de idioma <span class="badge bg-light text-dark"><i class="fas fa-globe"></i> English → Español</span> para traducir todo el contenido.
                        </div>
                    </div>
                    
                    <form action="{{ route('trivia.submit') }}" method="POST" id="quizForm">
                        @csrf
                        
                        @foreach($questions as $index => $question)
                            <div class="question-card p-4 mb-4 border rounded shadow-sm">
                                <h4 class="mb-3">{{ $index + 1 }}. {!! htmlspecialchars_decode($question['question']) !!}</h4>
                                
                                <div class="mb-3">
                                    <p class="mb-2"><strong>Categoría:</strong> {{ $question['category'] }}</p>
                                </div>
                                
                                @if($question['type'] == 'multiple')
                                    @php
                                        $answers = array_merge([$question['correct_answer']], $question['incorrect_answers']);
                                        shuffle($answers);
                                    @endphp
                                    
                                    <div class="list-group">
                                        @foreach($answers as $answer)
                                            <label class="list-group-item list-group-item-action d-flex align-items-center">
                                                <input type="radio" name="question_{{ $index + 1 }}" value="{{ $answer }}" class="me-3" required>
                                                <span>{!! htmlspecialchars_decode($answer) !!}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="list-group">
                                        <label class="list-group-item list-group-item-action d-flex align-items-center">
                                            <input type="radio" name="question_{{ $index + 1 }}" value="True" class="me-3" required>
                                            <span>Verdadero</span>
                                        </label>
                                        <label class="list-group-item list-group-item-action d-flex align-items-center">
                                            <input type="radio" name="question_{{ $index + 1 }}" value="False" class="me-3" required>
                                            <span>Falso</span>
                                        </label>
                                    </div>
                                @endif
                                
                                <div class="mt-2 text-muted">
                                    <small>Dificultad: 
                                        <span class="badge bg-{{ $question['difficulty'] == 'easy' ? 'success' : ($question['difficulty'] == 'medium' ? 'warning' : 'danger') }}">
                                            {{ ucfirst($question['difficulty']) }}
                                        </span>
                                    </small>
                                </div>
                            </div>
                        @endforeach
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-check-circle me-2"></i> Enviar Respuestas
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('trivia.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Cancelar Quiz
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Botón flotante para traducir (aparece en dispositivos móviles) -->
<div id="translation-mobile-button" class="d-lg-none">
    <button class="btn btn-primary rounded-circle shadow">
        <i class="fas fa-language"></i>
    </button>
</div>

<!-- Script de Google Translate -->
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    includedLanguages: 'en,es',
    layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,
    autoDisplay: false,
    multilanguagePage: true
  }, 'google_translate_element');
  
  // Modificar el widget después de cargarlo
  setTimeout(function() {
    // Personalizar el widget después de la carga
    var selectElement = document.querySelector('.goog-te-combo');
    if (selectElement) {
      selectElement.className += ' form-select form-select-sm custom-select';
    }
    
    // En dispositivos móviles, conectar el botón flotante
    var mobileButton = document.getElementById('translation-mobile-button');
    if (mobileButton) {
      mobileButton.addEventListener('click', function() {
        var selectElement = document.querySelector('.goog-te-combo');
        if (selectElement) {
          // Abrir el menú desplegable
          selectElement.focus();
          selectElement.click();
        }
      });
    }
  }, 1000);
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<style>
/* Estilos generales */
.question-card {
    transition: all 0.3s ease;
}
.question-card:hover {
    background-color: #f8f9fa;
}

/* Contenedor del traductor */
.translate-container {
    position: relative;
    display: flex;
    align-items: center;
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 6px;
    padding: 0 10px;
    height: 36px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.translate-container:hover {
    background-color: rgba(255, 255, 255, 0.3);
}

/* Ícono del traductor */
.translate-container::before {
    content: "\f1ab";  /* Código del ícono de idioma de FontAwesome */
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    color: white;
    margin-right: 6px;
    display: flex;
    align-items: center;
}

/* Estilos para el widget de Google Translate */
#google_translate_element {
    display: flex;
    align-items: center;
}

#google_translate_element .goog-te-gadget {
    font-family: inherit;
    color: white;
}

#google_translate_element .goog-te-gadget-simple {
    border: none;
    background-color: transparent;
    display: flex;
    align-items: center;
    padding: 0;
}

#google_translate_element .goog-te-gadget-icon {
    display: none;
}

#google_translate_element .goog-te-menu-value {
    display: flex;
    align-items: center;
    color: white;
    font-weight: 600;
    font-size: 0.9rem;
    margin: 0;
}

#google_translate_element .goog-te-menu-value span {
    color: white;
    margin: 0 3px;
}

#google_translate_element .goog-te-menu-value span:first-child {
    margin-left: 0;
}

/* Estilo para el select cuando se personaliza */
.custom-select {
    border: none;
    background-color: transparent;
    color: white;
    outline: none;
    cursor: pointer;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    padding-right: 12px;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3E%3Cpath fill='white' d='M0 2l4 4 4-4z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right center;
}

.custom-select option {
    color: #333;
    background-color: white;
}

/* Ocultar elementos de Google Translate banner */
.goog-te-banner-frame {
    display: none !important;
}

body {
    top: 0 !important;
}

/* Botón flotante para dispositivos móviles */
#translation-mobile-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 100;
}

#translation-mobile-button button {
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1.5rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

/* Tooltip para explicar traducción */
.translate-tooltip {
    position: absolute;
    top: 50px;
    right: 0;
    background-color: #fff;
    box-shadow: 0 3px 15px rgba(0, 0, 0, 0.2);
    border-radius: 4px;
    padding: 10px 15px;
    font-size: 0.9rem;
    width: 250px;
    z-index: 1000;
    display: none;
}

.translate-container:hover .translate-tooltip {
    display: block;
}
</style>
@endsection
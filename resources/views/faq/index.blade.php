
@extends('layouts.PlantillaBase')

@section('title', 'Preguntas Frecuentes - EcoCárdenla')

@section('content')
<div class="container py-4">
    <div class="text-center mb-5">
        <img src="{{ asset('images\animal-amigable.png') }}" alt="Tortuga ecológica" style="width: 100px;">
        <h2 class="text-success mt-3">Preguntas Frecuentes</h2>
        <p class="text-muted">Encuentra respuestas rápidas sobre EcoCárdenla</p>
    </div>

    <div class="accordion" id="faqAccordion">
        {{-- Pregunta 1 --}}
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button text-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    🌱 ¿Qué es EcoCárdenla?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    EcoCárdenla es una plataforma educativa que enseña a niños a cuidar el medio ambiente a través de juegos, actividades y recompensas ecológicas.
                </div>
            </div>
        </div>

        {{-- Pregunta 2 --}}
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed text-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    🐢 ¿Cómo puedo acceder a los juegos?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Ingresa con tu cuenta, ve al menú "Juegos Ecológicos" y elige una actividad. ¡Recuerda recolectar eco-puntos!
                </div>
            </div>
        </div>

        {{-- Pregunta 3 --}}
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed text-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    🌎 ¿Puedo participar en actividades reales?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Sí, te avisamos sobre eventos ecológicos en tu escuela o comunidad. Participar te da más eco-puntos y recompensas.
                </div>
            </div>
        </div>

        {{-- Pregunta 4 --}}
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed text-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    📬 ¿Dónde puedo enviar sugerencias o reportar problemas?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Puedes usar nuestro <a href="{{ route('atencion.cliente') }}">formulario de atención al cliente</a> para dejar tus comentarios, sugerencias o reportar cualquier inconveniente.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
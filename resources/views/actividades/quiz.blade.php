@extends('layouts.PlantillaBase')

@section('title', 'Quiz de Naturaleza')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 p-4" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="text-center mb-4">
                <h2 class="display-4">Quiz de Naturaleza</h2>
                <p class="lead">Pon a prueba tus conocimientos sobre el medio ambiente</p>
            </div>

            <form action="{{ route('quiz.result') }}" method="POST">
                @csrf

                <!-- Pregunta 1 -->
                <div class="question-block mb-4">
                    <img src="{{ asset('images/pregunta1.png') }}" alt="Pregunta 1" class="img-fluid mb-3" style="max-width: 100px;">
                    <p class="h5">¿Qué deberíamos hacer con las botellas de plástico usadas?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question1" value="a" id="question1a">
                        <label class="form-check-label" for="question1a">Tirarlas al contenedor general</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question1" value="b" id="question1b">
                        <label class="form-check-label" for="question1b">Reciclarlas</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question1" value="c" id="question1c">
                        <label class="form-check-label" for="question1c">Quemarlas</label>
                    </div>
                </div>

                <!-- Pregunta 2 -->
                <div class="question-block mb-4">
                    <img src="{{ asset('images/pregunta2.png') }}" alt="Pregunta 2" class="img-fluid mb-3" style="max-width: 100px;">
                    <p class="h5">¿Qué podemos hacer para reducir el volumen de una botella plástica antes de reciclarla?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question2" value="a" id="question2a">
                        <label class="form-check-label" for="question2a">Dejarla como está</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question2" value="b" id="question2b">
                        <label class="form-check-label" for="question2b">Aplastarla</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question2" value="c" id="question2c">
                        <label class="form-check-label" for="question2c">Cortarla en pedazos pequeños</label>
                    </div>
                </div>

                <!-- Pregunta 3 -->
                <div class="question-block mb-4">
                    <img src="{{ asset('images/pregunta3.png') }}" alt="Pregunta 3" class="img-fluid mb-3" style="max-width: 100px;">
                    <p class="h5">¿De qué color es el contenedor para residuos orgánicos?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question3" value="a" id="question3a">
                        <label class="form-check-label" for="question3a">Verde</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question3" value="b" id="question3b">
                        <label class="form-check-label" for="question3b">Azul</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question3" value="c" id="question3c">
                        <label class="form-check-label" for="question3c">Marrón</label>
                    </div>
                </div>

                <!-- Pregunta 4 -->
                <div class="question-block mb-4">
                    <img src="{{ asset('images/pregunta4.png') }}" alt="Pregunta 4" class="img-fluid mb-3" style="max-width: 100px;">
                    <p class="h5">¿Qué sucede si dejamos el grifo abierto mientras nos cepillamos los dientes?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question4" value="a" id="question4a">
                        <label class="form-check-label" for="question4a">Ahorramos agua</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question4" value="b" id="question4b">
                        <label class="form-check-label" for="question4b">Desperdiciamos mucha agua</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question4" value="c" id="question4c">
                        <label class="form-check-label" for="question4c">Nada</label>
                    </div>
                </div>

                <!-- Pregunta 5 -->
                <div class="question-block mb-4">
                    <img src="{{ asset('images/pregunta5.png') }}" alt="Pregunta 5" class="img-fluid mb-3" style="max-width: 100px;">
                    <p class="h5">¿Qué animal está en peligro debido a las bolsas de plástico en el océano?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question5" value="a" id="question5a">
                        <label class="form-check-label" for="question5a">Tortugas marinas</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question5" value="b" id="question5b">
                        <label class="form-check-label" for="question5b">Elefantes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question5" value="c" id="question5c">
                        <label class="form-check-label" for="question5c">Gatos</label>
                    </div>
                </div>

                <!-- Pregunta 6 -->
                <div class="question-block mb-4">
                    <img src="{{ asset('images/pregunta6.png') }}" alt="Pregunta 6" class="img-fluid mb-3" style="max-width: 100px;">
                    <p class="h5">¿Qué se debe hacer con el papel usado?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question6" value="a" id="question6a">
                        <label class="form-check-label" for="question6a">Quemarlo</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question6" value="b" id="question6b">
                        <label class="form-check-label" for="question6b">Reciclarlo</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question6" value="c" id="question6c">
                        <label class="form-check-label" for="question6c">Tirarlo al suelo</label>
                    </div>
                </div>

                <!-- Pregunta 7 -->
                <div class="question-block mb-4">
                    <img src="{{ asset('images/pregunta7.png') }}" alt="Pregunta 7" class="img-fluid mb-3" style="max-width: 100px;">
                    <p class="h5">¿Qué es el compostaje?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question7" value="a" id="question7a">
                        <label class="form-check-label" for="question7a">Una técnica para reciclar plástico</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question7" value="b" id="question7b">
                        <label class="form-check-label" for="question7b">Un proceso para descomponer residuos orgánicos</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question7" value="c" id="question7c">
                        <label class="form-check-label" for="question7c">Una forma de hacer reciclaje en casa</label>
                    </div>
                </div>

                <!-- Pregunta 8 -->
                <div class="question-block mb-4">
                    <img src="{{ asset('images/pregunta8.png') }}" alt="Pregunta 8" class="img-fluid mb-3" style="max-width: 100px;">
                    <p class="h5">¿Qué material es más reciclable?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question8" value="a" id="question8a">
                        <label class="form-check-label" for="question8a">Papel</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question8" value="b" id="question8b">
                        <label class="form-check-label" for="question8b">Vidrio</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question8" value="c" id="question8c">
                        <label class="form-check-label" for="question8c">Plástico</label>
                    </div>
                </div>

                <!-- Botón de envío -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-lg mt-4">Enviar respuestas</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

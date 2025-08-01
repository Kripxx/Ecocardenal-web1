@extends('layouts.PlantillaBase')

@section('title', 'Trivia - Cuestionarios Educativos')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h2 class="mb-0 text-center">Trivia - Cuestionarios Educativos</h2>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/mascota-tortuga.png') }}" 
                             alt="Mascota Trivia" class="img-fluid mb-3" style="max-height: 150px;">
                        <p class="lead">¡Pon a prueba tus conocimientos con nuestros cuestionarios de trivia!</p>
                    </div>
                    
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    
                    @if(isset($error))
                        <div class="alert alert-warning">{{ $error }}</div>
                    @endif
                    
                    <form action="{{ route('trivia.generate') }}" method="GET" class="mb-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category" class="form-label">Categoría:</label>
                                    <select name="category" id="category" class="form-select">
                                        <option value="any">Cualquier Categoría</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="difficulty" class="form-label">Dificultad:</label>
                                    <select name="difficulty" id="difficulty" class="form-select">
                                        <option value="any">Cualquier Dificultad</option>
                                        <option value="easy">Fácil</option>
                                        <option value="medium">Media</option>
                                        <option value="hard">Difícil</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type" class="form-label">Tipo de Preguntas:</label>
                                    <select name="type" id="type" class="form-select">
                                        <option value="any">Cualquier Tipo</option>
                                        <option value="multiple">Opción Múltiple</option>
                                        <option value="boolean">Verdadero / Falso</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount" class="form-label">Cantidad de Preguntas:</label>
                                    <select name="amount" id="amount" class="form-select">
                                        <option value="5">5 preguntas</option>
                                        <option value="10" selected>10 preguntas</option>
                                        <option value="15">15 preguntas</option>
                                        <option value="20">20 preguntas</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-12 mt-4">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success btn-lg">
                                        <i class="fas fa-play-circle me-2"></i> Crear Quiz
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="alert alert-info">
                                <h5 class="alert-heading"><i class="fas fa-info-circle me-2"></i> ¿Cómo funciona?</h5>
                                <p class="mb-0">Selecciona la categoría, dificultad y tipo de preguntas que deseas, luego haz clic en "Crear Quiz" para comenzar. ¡Pon a prueba tus conocimientos y diviértete aprendiendo!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-home me-2"></i> Volver al Inicio
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
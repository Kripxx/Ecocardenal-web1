<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/juego/{nombre}', function ($nombre) {
    return response(view('actividades.juego'))->header('Content-Type', 'text/html');
});

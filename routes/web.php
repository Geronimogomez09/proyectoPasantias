<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios/usuario', "App\Http\Controllers\ControladorUsuario@Usuario");
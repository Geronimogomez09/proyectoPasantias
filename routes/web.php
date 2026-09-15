<?php

use Illuminate\Support\Facades\Route;

Route::get('/usuarios/index', "App\Http\Controllers\ControladorUsuario@Usuario");

Route::get('/producto/principal/create', "App\Http\Controllers\ControladorProducto@create");

Route::get('/producto/principal/{id}/edit', 'App\Http\Controllers\ControladorProducto@edit');

Route::post('/producto/principal/{id}/update', 'App\Http\Controllers\ControladorProducto@update');

Route::delete('/producto/principal/{id}', 'App\Http\Controllers\ControladorProducto@destroy');
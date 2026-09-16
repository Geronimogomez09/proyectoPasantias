<?php

use Illuminate\Support\Facades\Route;

Route::get('/producto/principal', "App\Http\Controllers\ControladorProducto@Principal");

Route::get('/usuarios/index', "App\Http\Controllers\ControladorUsuario@Usuario");

Route::get('/usuarios/registro', "App\Http\Controllers\ControladorUsuario@registro");

Route::get('/producto/principal/create', "App\Http\Controllers\ControladorProducto@create");

Route::get('/producto/principal/{id}/edit', 'App\Http\Controllers\ControladorProducto@edit');

Route::post('/producto/principal/{id}/update', 'App\Http\Controllers\ControladorProducto@update');

Route::delete('/producto/principal/{id}', 'App\Http\Controllers\ControladorProducto@destroy');

route::post('/usuarios/registro/store','App\http\controllers\controladorUsuario@store');

route::get('/usuarios/registro/create','App\http\controllers\controladorUsuario@create');

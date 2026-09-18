<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorUsuario;
use App\Http\Controllers\ControladorProducto;

// Rutas de Usuarios / Login /logout
Route::get('/usuarios/index', [ControladorUsuario::class, 'Usuario']);
Route::post('/usuarios/index/login', [ControladorUsuario::class, 'login']);
Route::post('/usuarios/logout', [ControladorUsuario::class, 'logout']);


// Rutas de Registro
Route::get('/usuarios/registro', [ControladorUsuario::class, 'registro']);
Route::get('/usuarios/registro/create', [ControladorUsuario::class, 'create']);
Route::post('/usuarios/registro/store', [ControladorUsuario::class, 'store']);

Route::get('/producto/principal', "App\Http\Controllers\ControladorProducto@Principal");

Route::get('/usuarios/index', "App\Http\Controllers\ControladorUsuario@Usuario");

Route::get('/producto/principal/create', "App\Http\Controllers\ControladorProducto@create");

Route::post('/producto/principal/store', 'App\Http\Controllers\ControladorProducto@store');

Route::get('/producto/principal/{id}/edit', 'App\Http\Controllers\ControladorProducto@edit');

Route::post('/producto/principal/{id}/update', 'App\Http\Controllers\ControladorProducto@update');

Route::delete('/producto/principal/{id}', 'App\Http\Controllers\ControladorProducto@destroy');
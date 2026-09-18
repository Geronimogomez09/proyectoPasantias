<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorUsuario;
use App\Http\Controllers\ControladorProducto;

// Rutas de invitado (sin sesión activa)
Route::middleware('guest')->group(function () {
    Route::get('/usuarios/index', [ControladorUsuario::class, 'Usuario'])->name('login');
    Route::post('/usuarios/index/login', [ControladorUsuario::class, 'login']);

    Route::get('/usuarios/registro', [ControladorUsuario::class, 'registro']);
    Route::post('/usuarios/registro/store', [ControladorUsuario::class, 'store']);
});

// Logout (requiere sesión activa)
Route::post('/usuarios/logout', [ControladorUsuario::class, 'logout'])->middleware('auth');

// Rutas de Productos (requieren sesión activa)
Route::middleware('auth')->group(function () {
    Route::get('/producto/principal', [ControladorProducto::class, 'Principal']);
    Route::get('/producto/principal/create', [ControladorProducto::class, 'create']);
    Route::post('/producto/principal/store', [ControladorProducto::class, 'store']);
    Route::get('/producto/principal/{id}/edit', [ControladorProducto::class, 'edit']);
    Route::post('/producto/principal/{id}/update', [ControladorProducto::class, 'update']);
    Route::delete('/producto/principal/{id}', [ControladorProducto::class, 'destroy']);
});


<?php
/*
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorUsuario;

Route::get('/producto/principal', "App\Http\Controllers\ControladorProducto@Principal");

Route::get('/usuarios/index', "App\Http\Controllers\ControladorUsuario@Usuario");

Route::get('/usuarios/registro', "App\Http\Controllers\ControladorUsuario@registro");

Route::get('/producto/principal/create', "App\Http\Controllers\ControladorProducto@create");

Route::get('/producto/principal/{id}/edit', 'App\Http\Controllers\ControladorProducto@edit');

Route::post('/producto/principal/{id}/update', 'App\Http\Controllers\ControladorProducto@update');

Route::delete('/producto/principal/{id}', 'App\Http\Controllers\ControladorProducto@destroy');

route::post('/usuarios/registro/store','App\http\controllers\controladorUsuario@store');

route::get('/usuarios/registro/create','App\http\controllers\controladorUsuario@create');

Route::post('/usuarios/index/login', 'App\http\controllers\controladorUsuario@login');

*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorUsuario;
use App\Http\Controllers\ControladorProducto;

// Rutas de Productos
Route::get('/producto/principal', [ControladorProducto::class, 'Principal']);
Route::get('/producto/principal/create', [ControladorProducto::class, 'create']);
Route::get('/producto/principal/{id}/edit', [ControladorProducto::class, 'edit']);
Route::post('/producto/principal/{id}/update', [ControladorProducto::class, 'update']);
Route::delete('/producto/principal/{id}', [ControladorProducto::class, 'destroy']);

// Rutas de Usuarios / Login
Route::get('/usuarios/index', [ControladorUsuario::class, 'Usuario']);
Route::post('/usuarios/index/login', [ControladorUsuario::class, 'login']);

// Rutas de Registro
Route::get('/usuarios/registro', [ControladorUsuario::class, 'registro']);
Route::get('/usuarios/registro/create', [ControladorUsuario::class, 'create']);
Route::post('/usuarios/registro/store', [ControladorUsuario::class, 'store']);

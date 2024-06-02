<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\DetalleServicioController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('personas', PersonaController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('tecnicos', TecnicoController::class);
Route::resource('marcas', MarcaController::class);
Route::resource('tipos', TipoController::class);
Route::resource('equipos', EquipoController::class);
Route::resource('estados', EstadoController::class);
// Route::resource('servicios', ServicioController::class);
// Route::resource('detalles-servicio', DetalleServicioController::class);

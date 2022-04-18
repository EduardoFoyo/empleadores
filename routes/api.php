<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/lista/pregunta', [App\Http\Controllers\ApiRestController::class, 'listaPregunta'])->name('lista_pregunta');
Route::post('/lista/encuestado', [App\Http\Controllers\ApiRestController::class, 'listaEncuestado'])->name('lista_encuestado');
Route::post('/lista/respuesta', [App\Http\Controllers\ApiRestController::class, 'listaRespuesta'])->name('lista_respuesta');
Route::post('/lista/respuesta/pregunta', [App\Http\Controllers\ApiRestController::class, 'listaRespuestaPregunta'])->name('lista_respuesta_pregunta');
Route::post('/agrega/pregunta', [App\Http\Controllers\ApiRestController::class, 'agregaPregunta'])->name('agrega_pregunta');
Route::post('/inicia/encuesta', [App\Http\Controllers\ApiRestController::class, 'iniciaEncuesta'])->name('inicia_encuesta');
Route::post('/muestra/pregunta', [App\Http\Controllers\ApiRestController::class, 'muestraPregunta'])->name('muestra_pregunta');
Route::post('/siguiente/pregunta', [App\Http\Controllers\ApiRestController::class, 'siguientePregunta'])->name('siguiente_pregunta');
Route::post('/siguiente/pregunta/humanidades', [App\Http\Controllers\ApiRestController::class, 'siguientePreguntaHumanidades'])->name('siguiente_pregunta_humanidades');

Route::post('/genera/url', [App\Http\Controllers\ApiRestController::class, 'generaUrl'])->name('genera_url');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
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
Route::post('/agrega/pregunta', [App\Http\Controllers\ApiRestController::class, 'agregaPregunta'])->name('agrega_pregunta');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

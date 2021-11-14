<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pregunta;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/encuesta', function () {
    $preguntas = Pregunta::first();
    return view('poll.poll', ['preguntas' => $preguntas]);
})->name('encuesta');

Route::get('/save/poll', function (Request $request) {
    
})->name('save_poll');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/preguntas', [App\Http\Controllers\HomeController::class, 'addQuestionView'])->name('add_question');
Route::get('/resultado/encuestado/{id}', [App\Http\Controllers\HomeController::class, 'resultadoEncuestado'])->name('resultado_encuestado');
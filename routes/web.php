<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pregunta;
use App\Models\Tema;
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
    //return view('welcome');
    return view('auth.login');
});

Auth::routes();

Route::get('/encuesta', function () {
    $tema = Tema::all()->where("id_area", "=", 1);
    $preguntas = Pregunta::first();
    return view('poll.poll', ['preguntas' => $preguntas,'temas' => $tema]);
})->name('encuesta');

Route::get('/save/poll', function (Request $request) {
    
})->name('save_poll');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/preguntas', [App\Http\Controllers\HomeController::class, 'addQuestionView'])->name('add_question');
Route::get('/resultado/encuestado/{id}', [App\Http\Controllers\HomeController::class, 'resultadoEncuestado'])->name('resultado_encuestado');
Route::get('/resultado/pregunta/{id}', [App\Http\Controllers\HomeController::class, 'resultadoPregunta'])->name('resultado_pregunta');
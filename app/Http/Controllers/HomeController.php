<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tema;
use App\Models\Encuestado;
use App\Models\Pregunta;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function addQuestionView()
    {
        $tema = Tema::all()->where("id_area",1);
        return view('poll.addquestion', ['temas' => $tema]);
    }

    public function resultadoEncuestado(Request $request,$id)
    {
        $encuestado = Encuestado::find($id);
        return view('resultado', ['encuestado' => $encuestado]);
    }

    public function resultadoPregunta(Request $request,$id)
    {
        $pregunta = Pregunta::find($id);
        return view('resultado_pregunta', ['pregunta' => $pregunta]);
    }
}

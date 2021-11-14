<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tema;
use App\Models\Encuestado;
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
        $tema = Tema::all();
        return view('poll.addquestion', ['temas' => $tema]);
    }

    public function resultadoEncuestado(Request $request,$id)
    {
        $encuestado = Encuestado::find($id);
        // $preguntas = DB::select('SELECT 
        //                 p.pregunta,r.respuesta
        //             FROM
        //                 siaee.respuesta_encuestado re
        //                 INNER JOIN siaee.encuestado e ON re.id_encuestado = e.id
        //                 INNER JOIN siaee.respuesta r ON re.id_respuesta = r.id
        //                 INNER JOIN siaee.pregunta p ON r.id_pregunta = p.id
        //             WHERE
        //                 re.id_encuestado = ?', [$id]);
        // dd($preguntas);
        return view('resultado', ['encuestado' => $encuestado]);
    }
}

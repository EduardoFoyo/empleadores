<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;
use Yajra\Datatables\Datatables;

class ApiRestController extends Controller
{
    public function listaPregunta(Request $request)
    {
        return Datatables::of(Pregunta::all())->toJson();
    }
    
    public function agregaPregunta(Request $request)
    {
        $pregunta = new Pregunta();
        $pregunta->id_area = $request->area;
        $pregunta->pregunta = $request->pregunta;
        $pregunta->save();

        return response()->json(array(
            "success" => true,
            "message" => "Guardado"
        ), 200);
    }

}

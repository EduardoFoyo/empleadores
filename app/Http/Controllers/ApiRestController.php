<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Pregunta;
use App\Models\Encuestado;
use App\Models\Respuesta;
use App\Models\RespuestaEncuestado;
use Illuminate\Support\Facades\DB;

class ApiRestController extends Controller
{
    public function listaPregunta(Request $request)
    {
        return Datatables::of(DB::select('SELECT 
	                                        p.pregunta,a.area,t.tema
                                        FROM
                                            siaee.pregunta p
                                        INNER JOIN siaee.area a ON p.id_area = a.id
                                        INNER JOIN siaee.tema t ON p.id_tema = t.id
                                        WHERE p.id_area = "1"'))->toJson();
    }

    public function listaEncuestado(Request $request)
    {
        return Datatables::of(Encuestado::all())->toJson();
    }

    public function listaRespuesta(Request $request)
    {
        return Datatables::of(DB::select('SELECT 
                        p.pregunta,r.respuesta
                    FROM
                        siaee.respuesta_encuestado re
                        INNER JOIN siaee.encuestado e ON re.id_encuestado = e.id
                        INNER JOIN siaee.respuesta r ON re.id_respuesta = r.id
                        INNER JOIN siaee.pregunta p ON r.id_pregunta = p.id
                    WHERE
                        re.id_encuestado = ?', [$request->id_encuestado]))->toJson();
    }
    
    public function agregaPregunta(Request $request)
    {
        $pregunta = new Pregunta();
        $pregunta->id_area = $request->area;
        $pregunta->id_tema = $request->tema;
        $pregunta->pregunta = $request->pregunta;
        $pregunta->save();

        return response()->json(array(
            "success" => true,
            "message" => "Guardado"
        ), 200);
    }

    public function iniciaEncuesta(Request $request)
    {
        $encuestado = new Encuestado();
        $encuestado->nombre = $request->nombre; 
        $encuestado->empresa = $request->empresa;
        $encuestado->puesto = $request->puesto;
        $encuestado->save();

        $aux_encuestado = Encuestado::all();
        $id_encuestado = $aux_encuestado[count($aux_encuestado)-1]->id;
        
        return response()->json(array(
            "success" => true,
            "id_encuestado" => $id_encuestado
        ), 200);

    }

    public function muestraPregunta(Request $request)
    {
        $pregunta = Pregunta::where('id_area',2)->inRandomOrder()->first();
        return response()->json(array(
            "success" => true,
            "pregunta" => $pregunta
        ), 200);
    }

    public function siguientePreguntaHumanidades(Request $request)
    {
        $respuesta = new Respuesta();
        $respuesta->id_pregunta = $request->id_pregunta;
        $respuesta->respuesta = $request->respuesta;
        $respuesta->save();

        $aux_respuesta = Respuesta::all();
        $id_respuesta = $aux_respuesta[count($aux_respuesta)-1]->id;

        $enc_res = new RespuestaEncuestado();
        $enc_res->id_encuestado = $request->encuestado;
        $enc_res->id_respuesta = $id_respuesta;
        $enc_res->save();

        $pregunta = Pregunta::where('id_area', 2)
              ->whereNotIn('id', $request->preguntas)
              ->inRandomOrder()
              ->first();

        return response()->json(array(
            "success" => true,
            "pregunta" => $pregunta
        ), 200);
    }

    public function siguientePregunta(Request $request)
    {
        if ($request->id_pregunta == -1) {
            $pregunta = Pregunta::where("id_tema", $request->tema)->where("id_area",1)->inRandomOrder()->first();
            return response()->json(array(
                "success" => true,
                "pregunta" => $pregunta
            ), 200);
        }
        
        $respuesta = new Respuesta();
        $respuesta->id_pregunta = $request->id_pregunta;
        $respuesta->respuesta = $request->respuesta;
        $respuesta->save();

        $aux_respuesta = Respuesta::all();
        $id_respuesta = $aux_respuesta[count($aux_respuesta)-1]->id;

        $enc_res = new RespuestaEncuestado();
        $enc_res->id_encuestado = $request->encuestado;
        $enc_res->id_respuesta = $id_respuesta;
        $enc_res->save();

        //Aun sin probar
        //$pregunta = Pregunta::where("id_tema", $request->tema)->where("id_area",1)->inRandomOrder()->first();

        $pregunta = Pregunta::where("id_tema", $request->tema)
            ->where('id_area', 2)
            ->whereNotIn('id', $request->preguntas)
            ->inRandomOrder()
            ->first();

        return response()->json(array(
            "success" => true,
            "pregunta" => $pregunta
        ), 200);
    }
    
}
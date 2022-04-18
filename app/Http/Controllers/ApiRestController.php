<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Pregunta;
use App\Models\Encuestado;
use App\Models\Respuesta;
use App\Models\RespuestaEncuestado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApiRestController extends Controller
{
    public function listaPregunta(Request $request)
    {
        return Datatables::of(DB::select('SELECT 
	                                        p.id, p.pregunta,a.area,t.tema
                                        FROM
                                            pregunta p
                                        INNER JOIN area a ON p.id_area = a.id
                                        INNER JOIN tema t ON p.id_tema = t.id
                                        WHERE p.id_area = "1"'))->toJson();
    }

    public function listaEncuestado(Request $request)
    {
        return Datatables::of(Encuestado::all())->toJson();
    }

    public function generaUrl(Request $request)
    {
        $encuestado = new Encuestado();
        $encuestado->token_encuestado = Str::random(32);
        $encuestado->nombre = ""; 
        $encuestado->empresa = "";
        $encuestado->puesto = "";
        $encuestado->save();
        $url = $encuestado->token_encuestado;
        
        return response()->json(array(
            "url" => $url
        ), 200);
    }

    public function listaRespuesta(Request $request)
    {
        return Datatables::of(DB::select('SELECT 
                        p.pregunta,r.respuesta
                    FROM
                        respuesta_encuestado re
                        INNER JOIN encuestado e ON re.id_encuestado = e.id
                        INNER JOIN respuesta r ON re.id_respuesta = r.id
                        INNER JOIN pregunta p ON r.id_pregunta = p.id
                    WHERE
                        re.id_encuestado = ?', [$request->id_encuestado]))->toJson();
    }
    
    public function listaRespuestaPregunta(Request $request)
    {
        return Datatables::of(DB::select('SELECT 
                                e.id, e.nombre,r.respuesta
                            FROM
                                respuesta_encuestado re
                                INNER JOIN encuestado e ON re.id_encuestado = e.id
                                INNER JOIN respuesta r ON re.id_respuesta = r.id
                                INNER JOIN pregunta p ON r.id_pregunta = p.id
                            WHERE
                                p.id = ?', [$request->id_pregunta]))->toJson();
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
        $tokenSecret = '6LdlANseAAAAAA8hy2f3JjD1cvrEftpgp8qGRoMg';

        $token = $request->tokenCaptcha;
        $cu = curl_init();
        curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($cu, CURLOPT_POST, 1);
        curl_setopt($cu, CURLOPT_POSTFIELDS, "secret=$tokenSecret&response=$token");
        curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($cu);
        curl_close($cu);
        $result = json_decode($result, true);

        if (!($result['success'] == true && $result['score'] >= 0.5)) {
             return response()->json(array(
                "success" => false,
                "message" => "Captcha no valido"
            ), 200);
        }

        $this->validate($request, [
            'nombre' => 'required|max:255',
            'empresa' => 'required|max:255',
            'puesto' => 'required|max:255',
        ]);

        $encuestado = Encuestado::where('token_encuestado', $request->token_encuestado)->first();
        $encuestado->nombre = $request->nombre; 
        $encuestado->empresa = $request->empresa;
        $encuestado->puesto = $request->puesto;
        $encuestado->save();

        return response()->json(array(
            "success" => true
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
        $this->validate($request, [
            'id_pregunta' => 'required',
            'respuesta' => 'required',
            'token_encuestado' => 'required',
            'preguntas' => 'required',
        ]);


        $encuestado = Encuestado::where('token_encuestado',$request->token_encuestado)->first();
        if ($encuestado->realizado === 1) {
            return response()->json(array(
                "success" => false,
            ), 200);
        }
        
        
        $respuesta = new Respuesta();
        $respuesta->id_pregunta = $request->id_pregunta;
        $respuesta->respuesta = $request->respuesta;
        $respuesta->save();
        
        $aux_respuesta = Respuesta::all();
        $id_respuesta = $aux_respuesta[count($aux_respuesta)-1]->id;
        
        $enc_res = new RespuestaEncuestado();
        $enc_res->id_encuestado = $encuestado->id;
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

        $this->validate($request, [
            'id_pregunta' => 'required',
            'tema' => 'required',
            'respuesta' => 'required',
            'token_encuestado' => 'required',
            'preguntas' => 'required'
        ]);

        $encuestado = Encuestado::where('token_encuestado',$request->token_encuestado)->first();
        if ($encuestado->realizado === 1) {
            return response()->json(array(
                "success" => false,
            ), 200);
        }


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
        $enc_res->id_encuestado = $encuestado->id;
        $enc_res->id_respuesta = $id_respuesta;
        $enc_res->save();

        $pregunta = RespuestaEncuestado::where("id_encuestado", $encuestado->id)->get();

        if($pregunta->count()===9){
            $encuestado->realizado = 1;
            $encuestado->save();
            return response()->json(array(
                "success" => true,
                "pregunta" => null
            ), 200);
        }

        $pregunta = Pregunta::where('id_area', 1)
        ->where("id_tema", $request->tema)
        ->whereNotIn('id', $request->preguntas)
        ->inRandomOrder()
        ->first();
        
        return response()->json(array(
            "success" => true,
            "pregunta" => $pregunta
        ), 200);
    }
    
}
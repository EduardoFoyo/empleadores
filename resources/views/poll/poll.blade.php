<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Encuesta UASLP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div style="width: 100%; text-align: center">
            <img class="responsive-img" src="{{ asset('img/FotoCabeza.jpg')}}" alt="">
        </div>
        <div class="card" style="padding:30px">
            <div class="text-align: center !important;">
                <h3>Encuesta empleadores</h3>
            </div>
            <div id="state">
                <div class="row">
                    <div class="col s12 m4 l2"></div>
                    <div class="col s12 m4 l8">
                        <div>
                            <p>¿Nombre del empleador?</p>
                            <p>
                                <label>
                                    <input id="nombre" type="text" />
                                </label>
                            </p>
                            <p>¿Nombre de la empresa?</p>
                            <p>
                                <label>
                                    <input id="empresa" type="text" />
                                </label>
                            </p>
                            <p>¿Puesto del empleador en la empresa?</p>
                            <p>
                                <label>
                                    <input id="puesto" type="text" />
                                </label>
                            </p>
                        </div>
                    </div>
                    <div class="col s12 m4 l2"></div>
                </div>
                <div class="text-align: center !important;">
                    <a id="empezar" class="waves-effect waves-light btn-large">Empezar</a>
                </div>
            </div>

        </div>

    </div>

</body>

<script>
    var esatado = null;
    var id_encuestado = null;
    var cont_preguntas = 0;

    $("#empezar").click(() => {
        $.ajax({
            type:"POST",
            url:"{{route('inicia_encuesta')}}",
            data:{
                nombre:$( "#nombre" ).val(),
                empresa:$( "#empresa" ).val(),
                puesto:$( "#puesto" ).val(),
            },
            success:function(response){
                if (response.success) {
                    id_encuestado = response.id_encuestado;
                    creapPreguta(response.id_encuestado);
                }
            },
        });
    });

    function creapPreguta(encuestado) {
        $.ajax({
            type:"POST",
            url:"{{route('muestra_pregunta')}}",
            success:function(response){
                var estado_final_r = estado_final.replace("--pregunta--", response.pregunta.pregunta).replace("--id_pregunta--", response.pregunta.id);
                $("#state").html(estado_final_r);
            },
        });
    }

    var estado_final = 
    `<div class="row">
        <div class="col s12 m4 l2"></div>
        <div class="col s12 m4 l8">
            <div>
                <input type="hidden" id="id_pregunta" value="--id_pregunta--">
                <p>--pregunta--</p>
                <p class="col s12 m4 l1">
                    <label>
                        <input name="radio" onchange="guardaEstado(1)" type="radio"/>
                        <span>1</span>
                    </label>
                </p>
                <p class="col s12 m4 l1">
                    <label>
                        <input name="radio" onchange="guardaEstado(2)" type="radio" />
                        <span>2</span>
                    </label>
                </p>
                <p class="col s12 m4 l1">
                    <label>
                        <input name="radio" onchange="guardaEstado(3)" type="radio" />
                        <span>3</span>
                    </label>
                </p>
                <p class="col s12 m4 l1">
                    <label>
                        <input name="radio" onchange="guardaEstado(4)" type="radio" />
                        <span>4</span>
                    </label>
                </p>
                <p class="col s12 m4 l1">
                    <label>
                        <input name="radio" onchange="guardaEstado(5)" type="radio" />
                        <span>5</span>
                    </label>
                </p>
                <p class="col s12 m4 l1">
                    <label>
                        <input name="radio" onchange="guardaEstado(6)" type="radio" />
                        <span>6</span>
                    </label>
                </p>
                <p class="col s12 m4 l1">
                    <label>
                        <input name="radio" onchange="guardaEstado(7)" type="radio" />
                        <span>7</span>
                    </label>
                </p>
            </div>
        </div>
        <div class="col s12 m4 l2"></div>
    </div>
    <hr style="width: 70%">
    <div class="text-align: center !important;">
        <a onclick="siguiente()" class="waves-effect waves-light btn-large">Siguiente</a>
    </div>` 

    
    function guardaEstado(estado_nuevo) {esatado = estado_nuevo;}

    function siguiente() {
        cont_preguntas++;
        if (cont_preguntas < 10 ) {
            $.ajax({
                type:"POST",
                url:"{{route('siguiente_pregunta')}}",
                data:{
                    id_pregunta: $( "#id_pregunta" ).val(),
                    respuesta: esatado,
                    encuestado: id_encuestado,
                },
                success:function(response){
                    var estado_final_r = estado_final.replace("--pregunta--", response.pregunta.pregunta).replace("--id_pregunta--", response.pregunta.id);
                    $("#state").html(estado_final_r);
                },
            });
        }else{
            $.ajax({
                type:"POST",
                url:"{{route('siguiente_pregunta')}}",
                data:{
                    id_pregunta: $( "#id_pregunta" ).val(),
                    respuesta: esatado,
                    encuestado: id_encuestado,
                },
                success:function(response){
                    $("#state").html(`<h1 style="text-align: center !important;">Gracias por el apoyo</h1>`);
                },
            });
        }
    }

</script>

</html>
{{--
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

</head>

<body>
    <div class="container">
        <div class="card">
            <div class="text-align: center !important;">
                <h3>Encuesta para empleadores</h3>
            </div>
            @foreach ($preguntas as $pregunta)
            <div class="row">

                <div class="col s12 m4 l2"></div>
                <div class="col s12 m4 l8">
                    <div>
                        <p>{{ $pregunta->pregunta }}</p>
                        <p class="col s12 m4 l1">
                            <label>
                                <input name="radio_{{ $pregunta->id }}" type="radio" checked />
                                <span>1</span>
                            </label>
                        </p>
                        <p class="col s12 m4 l1">
                            <label>
                                <input name="radio_{{ $pregunta->id }}" type="radio" />
                                <span>2</span>
                            </label>
                        </p>
                        <p class="col s12 m4 l1">
                            <label>
                                <input name="radio_{{ $pregunta->id }}" type="radio" />
                                <span>3</span>
                            </label>
                        </p>
                        <p class="col s12 m4 l1">
                            <label>
                                <input name="radio_{{ $pregunta->id }}" type="radio" />
                                <span>4</span>
                            </label>
                        </p>
                        <p class="col s12 m4 l1">
                            <label>
                                <input name="radio_{{ $pregunta->id }}" type="radio" />
                                <span>5</span>
                            </label>
                        </p>
                        <p class="col s12 m4 l1">
                            <label>
                                <input name="radio_{{ $pregunta->id }}" type="radio" />
                                <span>6</span>
                            </label>
                        </p>
                    </div>
                </div>
                <div class="col s12 m4 l2"></div>
            </div>
            <hr style="width: 70%">
            @endforeach
            <div class="text-align: center !important;">
                <a class="waves-effect waves-light btn-large">button</a>
            </div>
            <br>
        </div>

    </div>

</body>
<script>

</script>

</html> --}}
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

</head>

<body>
    <div class="container">
        <div class="card">
            <div class="text-align: center !important;">
                <h3>Encuesta para empleadores</h3>
            </div>
            <div class="row">
                <div class="col s12 m4 l2"></div>
                <div class="col s12 m4 l8">
                    <div>
                        <p>{{ $preguntas->pregunta }}</p>
                        <p class="col s12 m4 l1">
                            <label>
                                <input name="radio_{{ $preguntas->id }}" type="radio" checked />
                                <span>1</span>
                            </label>
                        </p>
                        <p class="col s12 m4 l1">
                            <label>
                                <input name="radio_{{ $preguntas->id }}" type="radio" />
                                <span>2</span>
                            </label>
                        </p>
                        <p class="col s12 m4 l1">
                            <label>
                                <input name="radio_{{ $preguntas->id }}" type="radio" />
                                <span>3</span>
                            </label>
                        </p>
                        <p class="col s12 m4 l1">
                            <label>
                                <input name="radio_{{ $preguntas->id }}" type="radio" />
                                <span>4</span>
                            </label>
                        </p>
                        <p class="col s12 m4 l1">
                            <label>
                                <input name="radio_{{ $preguntas->id }}" type="radio" />
                                <span>5</span>
                            </label>
                        </p>
                        <p class="col s12 m4 l1">
                            <label>
                                <input name="radio_{{ $preguntas->id }}" type="radio" />
                                <span>6</span>
                            </label>
                        </p>
                    </div>
                </div>
                <div class="col s12 m4 l2"></div>
            </div>
            <hr style="width: 70%">
            <div class="text-align: center !important;">
                <a class="waves-effect waves-light btn-large">button</a>
            </div>
            <br>
        </div>

    </div>

</body>
<script>

</script>

</html>
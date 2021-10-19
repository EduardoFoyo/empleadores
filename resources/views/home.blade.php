@extends('layouts.main')

@section('content')



<div class="container">
    {{-- Hacer solo modificaciones en esta parte del codigo todo dentro de aqui es la pagina menos la barra de
    navegacion--}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    {{-- ----------------------------------------------------- --}}
    <form role="form">
        <div class="form-group">
            <label>¿El empleado asiste y llega puntual a todas sus jornadas laborales?</label>
            <div class="checkbox">
                <label><input type="checkbox"> 1 </label>
                <label><input type="checkbox"> 2 </label>
                <label><input type="checkbox"> 3 </label>
                <label><input type="checkbox"> 4 </label>
                <label><input type="checkbox"> 5 </label>
                <label><input type="checkbox"> 6 </label>
                <label><input type="checkbox"> 7 </label>
            </div>
        </div>

        <div class="form-group">
            <label>¿El empleado muestra dominio sobre los conocimientos previos a su entrada a la empresa?</label>
            <div class="checkbox">
                <label><input type="checkbox"> 1 </label>
                <label><input type="checkbox"> 2 </label>
                <label><input type="checkbox"> 3 </label>
                <label><input type="checkbox"> 4 </label>
                <label><input type="checkbox"> 5 </label>
                <label><input type="checkbox"> 6 </label>
                <label><input type="checkbox"> 7 </label>
            </div>
        </div>

        <div class="form-group">
            <label>¿El empleado muestra una facilidad para el trabajo el equipo?</label>
            <div class="checkbox">
                <label><input type="checkbox"> 1 </label>
                <label><input type="checkbox"> 2 </label>
                <label><input type="checkbox"> 3 </label>
                <label><input type="checkbox"> 4 </label>
                <label><input type="checkbox"> 5 </label>
                <label><input type="checkbox"> 6 </label>
                <label><input type="checkbox"> 7 </label>
            </div>
        </div>

        <div class="form-group">
            <label>¿El empleado muestra facilidad para el desarrollo de tareas que le han sido asignadas?</label>
            <div class="checkbox">
                <label><input type="checkbox"> 1 </label>
                <label><input type="checkbox"> 2 </label>
                <label><input type="checkbox"> 3 </label>
                <label><input type="checkbox"> 4 </label>
                <label><input type="checkbox"> 5 </label>
                <label><input type="checkbox"> 6 </label>
                <label><input type="checkbox"> 7 </label>
            </div>
        </div>

        <div class="form-group">
            <label>¿El empleado puede delegar fácilmente tareas para su realización?</label>
            <div class="checkbox">
                <label><input type="checkbox"> 1 </label>
                <label><input type="checkbox"> 2 </label>
                <label><input type="checkbox"> 3 </label>
                <label><input type="checkbox"> 4 </label>
                <label><input type="checkbox"> 5 </label>
                <label><input type="checkbox"> 6 </label>
                <label><input type="checkbox"> 7 </label>
            </div>
        </div>

        <div class="form-group">
            <label>¿El empleado logra tener un buen desempeño en el idioma inglés?</label>
            <div class="checkbox">
                <label><input type="checkbox"> 1 </label>
                <label><input type="checkbox"> 2 </label>
                <label><input type="checkbox"> 3 </label>
                <label><input type="checkbox"> 4 </label>
                <label><input type="checkbox"> 5 </label>
                <label><input type="checkbox"> 6 </label>
                <label><input type="checkbox"> 7 </label>
            </div>
        </div>

        <div class="form-group">
            <label>¿El empleado trata de generar un gran ambiente laboral en los equipos de los cuales forma parte?</label>
            <div class="checkbox">
                <label><input type="checkbox"> 1 </label>
                <label><input type="checkbox"> 2 </label>
                <label><input type="checkbox"> 3 </label>
                <label><input type="checkbox"> 4 </label>
                <label><input type="checkbox"> 5 </label>
                <label><input type="checkbox"> 6 </label>
                <label><input type="checkbox"> 7 </label>
            </div>
        </div>

        <div class="form-group">
            <label>¿Cómo calificaría en general el desempeño del empleado?</label>
            <div class="checkbox">
                <label><input type="checkbox"> 1 </label>
                <label><input type="checkbox"> 2 </label>
                <label><input type="checkbox"> 3 </label>
                <label><input type="checkbox"> 4 </label>
                <label><input type="checkbox"> 5 </label>
                <label><input type="checkbox"> 6 </label>
                <label><input type="checkbox"> 7 </label>
            </div>
        </div>

        <div class="form-group">
            <label>Descripción breve de las tareas/responsabilidades que desempeña el empleado:</label>
            <input type="text" class="form-control" id="text">
        </div>

        <div class="form-group">
            <label>¿Qué áreas de oportunidad cree usted que el empleado pueda aprovechar?</label>
            <input type="text" class="form-control" id="text">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection
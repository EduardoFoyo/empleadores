@extends('layouts.main')

@section('content')



<div class="container">
    {{-- Hacer solo modificaciones en esta parte del codigo todo dentro de aqui es la pagina menos la barra de
    navegacion--}}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card p-5">
                <div class="row mb-2">
                    <div class="col-sm-11">
                        <h1>Pregutnas</h1>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" id="agregar" class="btn btn-success mb-4 " data-toggle="modal"
                            data-target="#exampleModalCenter">
                            <ion-icon style="font-size: 25px; margin-top:8px;" name="add-outline"></ion-icon>
                        </button>
                    </div>
                </div>
                <table id="tabla_preguntas" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Pregunta</th>
                            <th>Area</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- ----------------------------------------------------- --}}
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Agregar pregunta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Escribe una pregunta</label>
                    <input type="text" id="enviar_pregunta" name="pregunta" class="form-control">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" onclick="guardar()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    let table;
    function guardar(params) {
        $.ajax({
            type:"POST",
            url:"{{route('agrega_pregunta')}}",
            data:{
                pregunta:$( "#enviar_pregunta" ).val(),
                area:1
            },
            success:function(datos){
                table.ajax.reload();
            },
        });
        
    }

    $(function() {
        table = $('#tabla_preguntas').DataTable({
            lengthMenu: [[10, 50, 300], [10, 50, 300]],
            dom: 'Blfrtip',
            buttons: [
                 'csv', 'excel', 'pdf'
            ],
            processing: true,
            serverSide: true,
            responsive: false,  
            searching: true,
            ajax: {
               "url": '{!! route('lista_pregunta') !!}',
               "type": 'POST',
            },
            columns:[
                {data: 'pregunta'},
                {data: 'id_area'},
            ],
            order: [[ 0, "desc" ]],
            
        });
    });
    
</script>
@endpush
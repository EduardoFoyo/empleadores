@extends('layouts.app')

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
</div>
<script>
    let list = document.querySelectorAll('.list');
    for (let i = 0; i < list.length; i++) {
        list[i].onclick = function(){
            let j = 0;
            while (j < list.length) {
                list[j++].className = 'list';
                
            }
            list[i].className = 'list active';
        }
    }
</script>
@endsection
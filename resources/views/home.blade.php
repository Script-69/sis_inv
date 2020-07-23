@extends('layouts.admin')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                  

                    <h1>{{ __('Inicio Satisfactorio!') }}</h1>
                    <h2>{{ auth()->user()->nombre_usuario}} {{ auth()->user()->apellido_paterno_usuario}} {{ auth()->user()->apellido_materno_usuario}}</h2>

                    @if (auth()->user()->tipo_usuario=='SU_ADMIN')
                    <h3>SUPER ADMIN</h3>
                    @else
                    @if (auth()->user()->tipo_usuario=='ADMIN')
                    <h3>ADMIN</h3>
                    @else
                    <h3>OPERADOR</h3>
                    @endif
                    @endif



                </div class="row">
                
                    <button class="btn btn-secondary" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión_') }}</button>
                

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    <a href="{{URL::action('UsuarioController@edit',auth()->user()->id_usuario)}}"><button class="btn btn-danger">Editar Perfil</button></a>
                                </div>
                <div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

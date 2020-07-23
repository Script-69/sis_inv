@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Usuarios @if (auth()->user()->tipo_usuario=='SU_ADMIN')
        <a href="usuario/create"><button class="btn btn-success">Nuevo</button></a>
        @endif
		</h3>
		@include('sidacta.usuario.search')

	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Celular</th>
					<th>Direccion</th>
					<th>Email</th>
					<th>Grado Academico</th>
					<th>Cargo</th>
					<th>Estado</th>
					<th>Tipo</th>
					<th>Privilegios</th>
				</thead>
				@foreach ($usuario as $u)
				<tr>
					<td>{{ $u->id_usuario}}</td>
					<td>{{ $u->nombre_usuario}}</td>
					<td>{{ $u->apellido_paterno_usuario}}</td>
					<td>{{ $u->apellido_materno_usuario}}</td>
					<td>{{ $u->celular_usuario}}</td>
					<td>{{ $u->direccion_usuario}}</td>
					<td>{{ $u->correo_electronico_usuario}}</td>
					<td>{{ $u->grado_instruccion_usuario}}</td>
					<td>{{ $u->cargo_actual_usuario}}</td>
					<td>{{ $u->estado_usuario}}</td>
					<td>{{ $u->tipo_usuario}}</td>
					<td>{{ $u->acceso_usuario}}</td>
					<td>
					@if (auth()->user()->tipo_usuario=='SU_ADMIN')
                    <a href="{{URL::action('UsuarioController@edit',$u->id_usuario)}}"><button class="btn btn-info">Editar</button></a>
						
					<a href="" data-target="#modal-delete-{{$u->id_usuario}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    @else
                    @if (auth()->user()->tipo_usuario=='ADMIN')
                    <a href="{{URL::action('UsuarioController@edit',$u->id_usuario)}}"><button class="btn btn-info" disabled="disabled">Editar</button></a>
                    @else
                    <a href="{{URL::action('UsuarioController@edit',$u->id_usuario)}}"><button class="btn btn-info" disabled="disabled">Editar</button></a>
                    @endif
                    @endif						
					</td>
				</tr>
				@include('sidacta.usuario.modal')
				@endforeach
			</table>
		</div>
		{{$usuario->render()}}
	</div>
</div>
@endsection
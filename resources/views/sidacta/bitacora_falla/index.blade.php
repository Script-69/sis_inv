@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reportes de Fallas
		@if (auth()->user()->tipo_usuario=='SU_ADMIN')
        <a href="bitacora_falla/create"><button class="btn btn-success">Nuevo</button></a>
        @endif
		</h3>
		@include('sidacta.bitacora_falla.search')

	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Sitio</th>
					<th>Almacen</th>
					<th>Equipo</th>
					<th>Usuario</th>
					<th>Descripcion</th>
					<th>Estado</th>
					
					<th>Opciones</th>
				</thead>
				@foreach ($bitacora as $b)
				<tr>
					<td>{{ $b->id_bitacora_falla}}</td>
					<td>{{ $b->sitio}}</td>
					<td>{{ $b->almacen}}</td>
					<td>{{ $b->equipo}}</td>
					<td>{{ $b->nombre}} {{ $b->apellido1}} {{ $b->apellido2}}</td>
					<td>{{ $b->descripcion_falla}}</td>
					<td>{{ $b->estado_falla}}</td>

					<td>
					@if (auth()->user()->tipo_usuario=='SU_ADMIN')
                    <a href="{{URL::action('BitacoraFallaController@edit',$b->id_bitacora_falla)}}"><button class="btn btn-info">Editar</button></a>
					<a href="" data-target="#modal-delete-{{$b->id_bitacora_falla}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    @else
                    @if (auth()->user()->tipo_usuario=='ADMIN')
                    <a href="{{URL::action('BitacoraFallaController@edit',$b->id_bitacora_falla)}}"><button class="btn btn-info">Editar</button></a>
                    @else
                    <a href="{{URL::action('BitacoraFallaController@edit',$b->id_bitacora_falla)}}"><button class="btn btn-info" disabled="disabled">Editar</button></a>
                    @endif
                    @endif
						
						
					</td>
				</tr>
				@include('sidacta.bitacora_falla.modal')
				@endforeach
			</table>
		</div>
		{{$bitacora->render()}}
	</div>
</div>
@endsection
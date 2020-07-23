@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Almacenes

		@if (auth()->user()->tipo_usuario=='SU_ADMIN')
        <a href="almacen/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @endif
		</h3> 
		@include('sidacta.almacen.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Sitio</th>
					<th>Descripcion</th>
					<th>Cantidad</th>
					<th>Estado</th>
				</thead>
				@foreach ($almacen as $almc)
				<tr>
					<td>{{ $almc->id_almacen}}</td>
					<td>{{ $almc->sitio}}</td>
					<td>{{ $almc->descripcion_almacen}}</td>
					<td>{{ $almc->cantidad_equipo_almacen}}</td>
					<td>{{ $almc->estado_almacen}}</td>
					<td>
						

					@if (auth()->user()->tipo_usuario=='SU_ADMIN')
                    	<a href="{{URL::action('AlmacenController@edit',$almc->id_almacen)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$almc->id_almacen}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    @else
                    @if (auth()->user()->tipo_usuario=='ADMIN')
                    	<a href="{{URL::action('AlmacenController@edit',$almc->id_almacen)}}"><button class="btn btn-info">Editar</button></a>
                    @else
                    	<a href="{{URL::action('AlmacenController@edit',$almc->id_almacen)}}"><button class="btn btn-info" disabled="disabled">Editar</button></a>
                    @endif
                    @endif
						
						
					</td>
				</tr>
				@include('sidacta.almacen.modal')
				@endforeach
			</table>
		</div>
		{{$almacen->render()}}
	</div>
</div>
@endsection
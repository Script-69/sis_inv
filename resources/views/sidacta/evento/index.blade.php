@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Sitios <a href="sitio/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('sidacta.sitio.search')

	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Departamento</th>
					<th>Municipio</th>
					<th>Localidad</th>
					<th>Telefono</th>
					<th>Encargado</th>
				</thead>
				@foreach ($sitio as $sit)
				<tr>
					<td>{{ $sit->id_sitio}}</td>
					<td>{{ $sit->nombre_sitio}}</td>
					<td>{{ $sit->departamento_sitio}}</td>
					<td>{{ $sit->municipio_sitio}}</td>
					<td>{{ $sit->localidad_sitio}}</td>
					<td>{{ $sit->telefono_sitio}}</td>
					<td>{{ $sit->id_usuario}}</td>
					<td>
						<a href="{{URL::action('SitioController@edit',$sit->id_sitio)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$sit->id_sitio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						
					</td>
				</tr>
				@include('sidacta.sitio.modal')
				@endforeach
			</table>
		</div>
		{{$sitio->render()}}
	</div>
</div>
@endsection
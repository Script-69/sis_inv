@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Equipos 
		@if (auth()->user()->tipo_usuario=='SU_ADMIN')
        <a href="equipo/create"><button class="btn btn-success">Nuevo</button></a>
        @endif
		</h3>
		<a href="{{URL::action('EquipoController@form')}}"><button class="btn btn-info">Generar Reporte</button></a>	
		@include('sidacta.equipo.search')

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
					<th>Proveedor</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Marca</th>
					<th>Pais de Origen</th>
					<th>Modelo</th>
					<th>SN</th>
					<th>PN</th>
					<th>Estado</th>
					<th>Precio</th>
					<th>Observaciones</th>
					<th>Categoria</th>
					<th>Cantidad</th>
					<th>Unidad de Medida</th>

					<th>Opciones</th>
				</thead>
				@foreach ($equipo as $eq)
				<tr>
					<td>{{ $eq->id_equipo}}</td>
					<td>{{ $eq->sitio}}</td>
					<td>{{ $eq->almacen}}</td>
					<td>{{ $eq->proveedor}}</td>
					<td>{{ $eq->nombre_equipo}}</td>
					<td>{{ $eq->descripcion_equipo}}</td>
					<td>{{ $eq->marca_equipo}}</td>
					<td>{{ $eq->pais_origen_equipo}}</td>
					<td>{{ $eq->modelo_equipo}}</td>
					<td>{{ $eq->numero_serie_equipo}}</td>
					<td>{{ $eq->numero_parte_equipo}}</td>
					<td>{{ $eq->estado_equipo}}</td>
					<td>{{ $eq->precio_referencial_equipo}}</td>
					<td>{{ $eq->observaciones_equipo}}</td>
					<td>{{ $eq->tipo_funcionamiento_equipo}}</td>
					<td>{{ $eq->cantidad_equipo}}</td>
					<td>{{ $eq->unidad_medida_equipo}}</td>
					<td>
					@if (auth()->user()->tipo_usuario=='SU_ADMIN')
                    <a href="{{URL::action('EquipoController@edit',$eq->id_equipo)}}"><button class="btn btn-info">Editar</button></a>
					<a href="" data-target="#modal-delete-{{$eq->id_equipo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>


                  <a href="{{URL::action('BitacoraFallaController@create',[$eq->id_equipo, $eq->sitio])}}"><button class="btn btn-info">falla</button></a>


                    @else
                    @if (auth()->user()->tipo_usuario=='ADMIN')
                    <a href="{{URL::action('EquipoController@edit',[$eq->id_equipo])}}"><button class="btn btn-info">Editar</button></a>
                    @else
                    <a href="{{URL::action('EquipoController@edit',$eq->id_equipo)}}"><button class="btn btn-info" disabled="disabled">Editar</button></a>
                    @endif
                    @endif
						
						
					</td>
				</tr>
				@include('sidacta.equipo.modal')
				@endforeach
			</table>
		</div>
		{{$equipo->render()}}
	</div>
</div>
@endsection
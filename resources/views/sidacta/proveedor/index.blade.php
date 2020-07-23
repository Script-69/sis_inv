@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Proveedores 
		@if (auth()->user()->tipo_usuario=='SU_ADMIN')
        <a href="proveedor/create"><button class="btn btn-success">Nuevo</button></a>
        @endif
		</h3>
		@include('sidacta.proveedor.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Email</th>
				</thead>
				@foreach ($proveedor as $pro)
				<tr>
					<td>{{ $pro->id_proveedor}}</td>
					<td>{{ $pro->nombre_proveedor}}</td>
					<td>{{ $pro->direccion_proveedor}}</td>
					<td>{{ $pro->telefono_proveedor}}</td>
					<td>{{ $pro->correo_electronico_proveedor}}</td>


					<td>
					@if (auth()->user()->tipo_usuario=='SU_ADMIN')
                    <a href="{{URL::action('ProveedorController@edit',$pro->id_proveedor)}}"><button class="btn btn-info">Editar</button></a>
					<a href="" data-target="#modal-delete-{{$pro->id_proveedor}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    @else
                    @if (auth()->user()->tipo_usuario=='ADMIN')
                    <a href="{{URL::action('ProveedorController@edit',$pro->id_proveedor)}}"><button class="btn btn-info">Editar</button></a>
                    @else
                    <a href="{{URL::action('ProveedorController@edit',$pro->id_proveedor)}}"><button class="btn btn-info" disabled="disabled">Editar</button></a>
                    @endif
                    @endif
						
						
					</td>
				</tr>
				@include('sidacta.proveedor.modal')
				@endforeach
			</table>
		</div>
		{{$proveedor->render()}}
	</div>
</div>
@endsection
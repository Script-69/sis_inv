@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Proveedor</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)	
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'sidacta/proveedor','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="id_proveedor">Numero de Identificacion Tributaria "NIT"</label>
				<input type="text" name="id_proveedor" class="form-control" placeholder="NIT">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="nombre_proveedor">Nombre del Proveedor</label>
				<input type="text" name="nombre_proveedor" class="form-control" placeholder="Nombre..."  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase()">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="direccion_proveedor">Direccion</label>
				<input type="text" name="direccion_proveedor" class="form-control" placeholder="Direccion..." style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase()">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="telefono_proveedor">Nro. Telefono</label>
				<input type="text" name="telefono_proveedor" class="form-control" placeholder="Nro. Telefono...">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="correo_electronico_proveedor">Correo Electronico</label>
				<input type="email" name="correo_electronico_proveedor" class="form-control" placeholder="nombre@empresa.com">
			</div>
			</div>
		    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Reset</button>
				<a href="\sidacta/usuario" class="btn btn-primary" type="reset">Cancelar</a>			
			</div>

			
		</div>
		
	</div>
	{!!Form::close()!!}
@endsection
@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Sitio</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)	
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'sidacta/sitio','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="id_sitio">Id Sitio</label>
				
				<input type="text" name="id_sitio" class="form-control" placeholder="ID del Sitio...." style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase()">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label>Encargado</label>
				<select name="id_usuario" class="form-control">
					@foreach ($usuario as $u)

						<option value="{{$u->id_usuario}}">{{$u->apellido_paterno_usuario}} {{$u->apellido_materno_usuario}} {{$u->nombre_usuario}} </option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="nombre_sitio">Nombre del Sitio</label>
				<input type="text" name="nombre_sitio" class="form-control" placeholder="Nombre del Sitio..." >
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="departamento_sitio">Departamento</label>
				<input type="text" name="departamento_sitio" class="form-control" placeholder="Ej. La Paz..." style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase()">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="municipio_sitio">Municipio</label>
				<input type="text" name="municipio_sitio" class="form-control" placeholder="Municipio donde se encuentra el Sitio..." style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase()">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="localidad_sitio">Localidad</label>
				<input type="text" name="localidad_sitio" class="form-control" placeholder="Localidad del sitio..." style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase()">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="telefono_sitio">Nro. Telefono</label>
				<input type="text" name="telefono_sitio" class="form-control" placeholder="Nro. Telefono...">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Reset</button>
				<a href="\sidacta/sitio" class="btn btn-primary" type="reset">Cancelar</a>
			</div>
		</div>
	</div>
	{!!Form::close()!!}
@endsection
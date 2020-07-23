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
				<input type="text" name="nombre_sitio" class="form-control" required value="{{old('nombre_sitio')}}" placeholder="Nombre del Sitio..." >
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="departamento_sitio">Departamento</label>
				<select name="departamento_sitio" class="form-control">
					<option value="ELEGIR">ELEGIR</option>
					<option value="-">----------</option>
					<option value="BENI">BENI</option>
					<option value="CHUQUISACA">CHUQUISACA</option>
					<option value="COCHABAMBA">COCHABAMBA</option>
					<option value="LA PAZ">LA PAZ</option>
					<option value="ORURO">ORURO</option>
					<option value="PANDO">PANDO</option>
					<option value="POTOSI">POTOSI</option>
					<option value="SANTA CRUZ">SANTA CRUZ</option>
					<option value="TARIJA">TARIJA</option>
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="provincia_sitio">Provincia</label>
				<input type="text" name="provincia_sitio" class="form-control" required value="{{old('provincia_sitio')}}" placeholder="Municipio donde se encuentra el Sitio..." style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase()">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="localidad_sitio">Localidad</label>
				<input type="text" name="localidad_sitio" class="form-control" required value="{{old('localidad_sitio')}}" placeholder="Localidad del sitio..." style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase()">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="telefono_sitio">Nro. Telefono</label>
				<input type="text" name="telefono_sitio" class="form-control" required value="{{old('telefono_sitio')}}" placeholder="Nro. Telefono...">
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
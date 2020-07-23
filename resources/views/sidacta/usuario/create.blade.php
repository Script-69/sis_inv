@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Usuario</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)	
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		</div>
	</div>
			@endif
 
			{!!Form::open(array('url'=>'sidacta/usuario','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="id_usuario">Nro. Documento de Identidad</label>
				<input type="text" name="id_usuario" class="form-control" required value="{{old('id_usuario')}}" placeholder="Nro. C.I. ...">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="nombre_usuario">Nombre/Nombres</label>
				<input type="text" name="nombre_usuario" class="form-control" required value="{{old('nombre_usuario')}}" placeholder="Nombre...">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="apellido_paterno_usuario">Apellido Paterno</label>
				<input type="text" name="apellido_paterno_usuario" class="form-control" required value="{{old('apellido_paterno_usuario')}}" placeholder="Apellido Paterno...">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="apellido_materno_usuario">Apellido Materno</label>
				<input type="text" name="apellido_materno_usuario" class="form-control" required value="{{old('apellido_materno_usuario')}}" placeholder="Apellido Materno...">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="celular_usuario">Nro. Celular</label>
				<input type="text" name="celular_usuario" class="form-control" required value="{{old('celular_usuario')}}" placeholder="Nro. Celular...">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="direccion_usuario">Direccion</label>
				<input type="text" name="direccion_usuario" class="form-control" required value="{{old('direccion_usuario')}}" placeholder="Direccion...">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="correo_electronico_usuario">Correo Electronico</label>
				<input type="email" name="correo_electronico_usuario" class="form-control" required value="{{old('correo_electronico_usuario')}}" placeholder="usuario@sidacta.com">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="grado_instruccion_usuario">Grado Academico</label>
				<input type="text" name="grado_instruccion_usuario" class="form-control" required value="{{old('grado_instruccion_usuario')}}" placeholder="Grado Academico">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="estado_usuario">Estado</label>
				<select name="estado_usuario" class="form-control">
					<option>ACTIVO</option>
					<option>INACTIVO</option>
				</select>
			</div>
		    </div>
		    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="tipo_usuario">Tipo Usuario</label>
				<select name="tipo_usuario" class="form-control">
					<option>SU_ADMIN</option>
					<option>ADMIN</option>
					<option>OPERADOR</option>
				</select>
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
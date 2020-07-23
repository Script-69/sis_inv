@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Usuario: {{ $usuario->nombre_usuario}} {{ $usuario->apellido_paterno_usuario}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)	
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($usuario, ['method'=> 'PATCH','route'=>['usuario.update', $usuario->id_usuario]])!!}
			{{Form::token()}}
			<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="id_usuario">Nro. Documento de Identidad</label>
				<input type="text" name="id_usuario" required value="{{$usuario->id_usuario}}"class="form-control">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="nombre_usuario">Nombre/Nombres</label>
				<input type="text" name="nombre_usuario" required value="{{$usuario->nombre_usuario}}" class="form-control">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="apellido_paterno_usuario">Apellido Paterno</label>
				<input type="text" name="apellido_paterno_usuario" required value="{{$usuario->apellido_paterno_usuario}}" class="form-control">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="apellido_materno_usuario">Apellido Materno</label>
				<input type="text" name="apellido_materno_usuario" required value="{{$usuario->apellido_materno_usuario}}" class="form-control">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="celular_usuario">Nro. Celular</label>
				<input type="text" name="celular_usuario" required value="{{$usuario->celular_usuario}}" class="form-control">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="direccion_usuario">Direccion</label>
				<input type="text" name="direccion_usuario" required value="{{$usuario->direccion_usuario}}" class="form-control">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="correo_electronico_usuario">Correo Electronico</label>
				<input type="email" name="correo_electronico_usuario" required value="{{$usuario->correo_electronico_usuario}}" class="form-control">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="grado_instruccion_usuario">Grado Academico</label>
				<input type="text" name="grado_instruccion_usuario" required value="{{$usuario->grado_instruccion_usuario}}" class="form-control">
			</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="estado_usuario">Estado</label>
				<select name="estado_usuario" class="form-control">
					<option value="{{$usuario->estado_usuario}}"selected>{{$usuario->estado_usuario}}</option>
					<option>        </option>
					<option>ACTIVO</option>
					<option>INACTIVO</option>
				</select>
			</div>
		    </div>
		    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="tipo_usuario">Tipo Usuario</label>
				<select name="tipo_usuario" class="form-control">
					<option value="{{$usuario->tipo_usuario}}"selected>{{$usuario->tipo_usuario}}</option>
					<option>        </option>
					<option>SU_ADMIN</option>
					<option>ADMIN</option>
					<option>OPERADOR</option>
				</select>
			</div>
		    </div>
		    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="password">Cambiar Password</label>
				<input type="text" name="password" class="form-control">
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
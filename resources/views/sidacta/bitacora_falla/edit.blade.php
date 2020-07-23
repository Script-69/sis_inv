@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Equipo:</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)	
				<li>{{$error}}</li>
			@endforeach
			</ul>
		</div>
		@endif 

		{!!Form::model($bitacora, ['method'=> 'PATCH','route'=>['bitacora_falla.update', $bitacora->id_bitacora_falla]])!!}
		{{Form::token()}}
	</div>
</div>
	<div class="row">

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label>Sitio</label>
				<select id="sitio" name="id_sitio" class="form-control">
				@foreach ($sitio as $sit)
					@if ($sit->id_sitio==$bitacora->id_sitio)
						<option value="{{$bitacora->id_sitio}}"selected>{{$sit->nombre_sitio}}</option>
			
					@endif
					@endforeach
										
		
				</select>
			</div> 
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label>Almacen</label>
				<select id="almacen" name="id_almacen" class="form-control">
					@foreach ($almacen as $almc)
					@if ($almc->id_almacen==$bitacora->id_almacen)
						<option value="{{$bitacora->id_almacen}}"selected>{{$almc->descripcion_almacen}}</option>
			
					@endif
					@endforeach

					

				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label>Equipo
				</label>
				<select id="equipo" name="id_equipo" class="form-control">
					@foreach ($equipo as $eq)
					@if ($eq->id_equipo==$bitacora->id_equipo)
						<option value="{{$bitacora->id_equipo}}"selected>{{$eq->nombre_equipo}}</option>
			
					@endif
					@endforeach




				</select>
			</div>
		</div>	
		@auth
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label>Usuario
				</label>
				<select id="usuario" name="id_usuario" class="form-control">
					@foreach ($usuario as $u)
					@if ($u->id_usuario==$bitacora->id_usuario)
						<option value="{{$bitacora->id_usuario}} "selected>{{$u->nombre_usuario}} </option>
			
					@endif
					@endforeach
					

				</select>
			</div>
		</div>	
		@endauth
		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="descripcion_falla">Descripcion</label>
				<input type="text" name="descripcion_falla" class="form-control" required value="{{$bitacora->descripcion_falla}}" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase()">
			</div>
		</div>
		 
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="estado_falla">Estado</label>
				<select name="estado_falla" class="form-control">
					<option value="{{$bitacora->estado_falla}}"selected>{{$bitacora->estado_falla}}</option>
					<option>-------</option>
					<option>ACTIVO</option>
					<option>SOLUCIONADA</option>
					<option>MANTENIMIENTO</option>

				</select>
			</div>
		</div>
		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Reset</button>
				<a href="\sidacta/bitacora_falla" class="btn btn-primary" type="reset">Cancelar</a>
			</div>
		</div>
	</div>
@endsection
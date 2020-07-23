@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Almacen: {{ $almacen->descripcion_almacen}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)	
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div> 
			@endif 
		</div>
	</div>
			{!!Form::model($almacen, ['method'=> 'PATCH','route'=>['almacen.update', $almacen->id_almacen]])!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="descripcion_almacen">Descripcion</label>
				<input type="text" name="descripcion_almacen" class="form-control" required value="{{$almacen->descripcion_almacen}}" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase()">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label>Sitio</label>
				<select name="id_sitio" class="form-control">
					@foreach ($sitio as $sit)
					@if ($sit->id_sitio==$almacen->id_sitio)
						<option value="{{$sit->id_sitio}}"selected>{{$sit->nombre_sitio}}</option>
					@else
						<option value="{{$sit->id_sitio}}">{{$sit->nombre_sitio}}</option>
					@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="cantidad_equipo_almacen">Cantidad</label>
				<input type="text" name="cantidad_equipo_almacen" class="form-control" required value="{{$almacen->cantidad_equipo_almacen}}" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase()">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="estado_almacen">Estado</label>
				<select name="estado_almacen" class="form-control" required value="{{$almacen->estado_almacen}}">
					<option>OPERATIVO</option>
					<option>FUERA DE SERVICIO</option>
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Reset</button>
				<a href="\sidacta/almacen" class="btn btn-primary" type="reset">Cancelar</a>
			</div>
		</div>
	</div>
@endsection
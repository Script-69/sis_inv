@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Almacen</h3>
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
			{!!Form::open(array('url'=>'sidacta/almacen','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="descripcion_almacen">Descripcion del Almacen</label>
				<input type="text" name="descripcion_almacen" class="form-control" required value="{{old('descripcion_almacen')}}" placeholder="Descripcion..." style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase()">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label>Sitio</label>
				<select name="id_sitio" class="form-control">
					@foreach ($sitio as $sit)
						<option value="{{$sit->id_sitio}}">{{$sit->nombre_sitio}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="cantidad_equipo_almacen">Cantidad</label>
				<input type="text" name="cantidad_equipo_almacen" class="form-control" required value="{{old('cantidad_equipo_almacen')}}">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="estado_almacen">Estado</label>
				<select name="estado_almacen" class="form-control" required value="{{old('estado_almacen')}}">
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
	{!!Form::close()!!}
@endsection
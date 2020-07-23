@extends ('layouts.admin')
@section ('contenido') 
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>REPORTE DE FALLA</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)	
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			{!!Form::open(array('url'=>'sidacta/bitacora_falla','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
		</div>
	</div>
			
	<div class="row">

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label>Sitio</label>
				<select id="sitio" name="id_sitio" class="form-control">
				
								
					<option value="{{$equipo->id_sitio}}"selected>{{$sitio}}</option>
				
		
				</select>
			</div> 
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label>Almacen</label>
				<select id="almacen" name="id_almacen" class="form-control">
					<option value="{{$equipo->id_almacen}}"selected>{{$equipo->id_almacen}}</option>

				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label>Equipo
				</label>
				<select id="equipo" name="id_equipo" class="form-control">
					<option value="{{$equipo->id_equipo}}"selected>{{$equipo->nombre_equipo}}</option>

				</select>
			</div>
		</div>	
		@auth
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label>Usuario
				</label>
				<select id="usuario" name="id_usuario" class="form-control">
					<option value="{{ auth()->user()->id_usuario}} "selected>{{ auth()->user()->nombre_usuario}} {{ auth()->user()->apellido_paterno_usuario}} {{ auth()->user()->apellido_materno_usuario}} </option>

				</select>
			</div>
		</div>	
		@endauth
		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="descripcion_falla">Descripcion</label>
				<input type="text" name="descripcion_falla" class="form-control" required value="{{old('descripcion_falla')}}" placeholder="Descripcion..." style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase()">
			</div>
		</div>
		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label for="estado_falla">Estado</label>
				<select name="estado_falla" class="form-control" required value="{{old('estado_falla')}}">
					<option>ACTIVA</option>
					<option>SOLUCIONADA</option>
					<option>MANTENIMIENTO</option>

				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Reset</button>
				<a href="\sidacta/equipo" class="btn btn-primary" type="reset">Cancelar</a>
			</div>
		</div>
	</div>
	<!-- <script type="text/javascript">
        // Consigue el elemento provincias/poblaciones por su identificador id. Es un método del DOM de HTML
        var id1 = document.getElementById("sitio");
        var id2 = document.getElementById("almacen");
        
        // Añade un evento change al elemento id1, asociado a la función cambiar()
        if (id1.addEventListener) {     // Para la mayoría de los navegadores, excepto IE 8 y anteriores
            id1.addEventListener("change", cambiar);
        } else if (id1.attachEvent) {   // Para IE 8 y anteriores
            id1.attachEvent("change", cambiar); // attachEvent() es el método equivalente a addEventListener()
        }

        // Definición de la función cambiar()
        function cambiar() {
            for (var i = 0; i < id2.options.length; i++)
            
            // -- Inicio del comentario -- 
            // Muestra solamente los id2 que sean iguales a los id1 seleccionados, según la propiedad display
            if(id2.options[i].getAttribute("codigo") == id1.options[id1.selectedIndex].getAttribute("codigo")){
                id2.options[i].style.display = "block";
            }else{
                id2.options[i].style.display = "none";
            }
            // -- Fin del comentario --
                    
            id2.value = "";
        }

        // Llamada a la función cambiar()
        cambiar();
    </script>-->
	{!!Form::close()!!}
@endsection
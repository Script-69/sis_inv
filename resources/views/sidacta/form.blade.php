@extends ('layouts.admin')
@section ('contenido')
{!! Form::open(array('url'=>'/pdfequipos','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<!--<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="sitio" placeholder="sitio...">
		<input type="text" class="form-control" name="almacen" placeholder="almacen...">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
	</div>
</div>-->
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>REPORTE PDF EQUIPOS
		</h3>
	</div>
</div>
<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label>Sitio</label>
				<select id="sitio" name="sitio" class="form-control">
						
					@foreach ($sitio as $sit)
						<option codigo="{{$sit->id_sitio}}" value="{{$sit->nombre_sitio}}">{{$sit->nombre_sitio}}</option>
					@endforeach
					<option  condi="todos" value="">TODOS LOS SITIOS</option>
				</select>
			</div> 
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class='form-group'>
				<label>Almacen</label>
				<select id="almacen" name="almacen" class="form-control">
					@foreach ($almacen as $almc)
						<option codigo="{{$almc->id_sitio}}" value="{{$almc->descripcion_almacen}}">{{$almc->descripcion_almacen}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Buscar</button>
			</div>
		</div>
</div>
<script type="text/javascript">
        // Consigue el elemento provincias/poblaciones por su identificador id. Es un método del DOM de HTML
        var id1 = document.getElementById("sitio");
        var id2 = document.getElementById("almacen");

        // Añade un evento change al elemento id1, asociado a la función cambiar()
        
        if (id1.addEventListener) {     // Para la mayoría de los navegadores, excepto IE 8 y anteriores
            id1.addEventListener("change", cambiar);
        } else if (id1.attachEvent) 
        {   // Para IE 8 y anteriores
            id1.attachEvent("change", cambiar); // attachEvent() es el método equivalente a addEventListener()
        }

        // Definición de la función cambiar()
        function cambiar() {
            for (var i = 0; i < id2.options.length; i++)
            
            // -- Inicio del comentario -- 
            // Muestra solamente los id2 que sean iguales a los id1 seleccionados, según la propiedad display
            if(id1.options[id1.selectedIndex].getAttribute("condi")=='todos'){
        	
        	id2.disabled = true;
        }
        else{
        	id2.disabled = false;
            if(id2.options[i].getAttribute("codigo") == id1.options[id1.selectedIndex].getAttribute("codigo")){
                id2.options[i].style.display = "block";
            }else{
                id2.options[i].style.display = "none";
            }
            // -- Fin del comentario --
                    
            id2.value = "";
        }
		}
        // Llamada a la función cambiar()
        cambiar();
    </script>
{{Form::close()}}
@endsection
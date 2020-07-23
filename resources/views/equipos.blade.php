<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>PRUEBA REPORTE</title>
	<style>
        @page {
            margin: 1cm 1cm;
            font-family: Arial;
            font-size: 12px;

        }      
    </style>
    <link rel="stylesheet" href="css/tabla_cosdea.css">
</head>
<body> 
	<table class="tabla_cosdea">
			<caption class="tabla_cosdea">EQUIPOS SIDACTA</caption>

			<thead>
				<tr>
					<th>Id</th>
					<th>Sitio</th>
					<th>Almacen</th>
					<th>Proveedor</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Marca</th>
					<th>Pais de Origen</th>
					<th>Modelo</th>
					<th>SN</th>
					<th>PN</th>
					<th>Estado</th>
					<th>Precio</th>
					<th>Observaciones</th>
					<th>Categoria</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($equipos as $eq)
				<tr>
					<td>{{ $eq->id_equipo}}</td>
					<td>{{ $eq->sitio}}</td>
					<td>{{ $eq->almacen}}</td>
					<td>{{ $eq->proveedor}}</td>
					<td>{{ $eq->nombre_equipo}}</td>
					<td>{{ $eq->descripcion_equipo}}</td>
					<td>{{ $eq->marca_equipo}}</td>
					<td>{{ $eq->pais_origen_equipo}}</td>
					<td>{{ $eq->modelo_equipo}}</td>
					<td>{{ $eq->numero_serie_equipo}}</td>
					<td>{{ $eq->numero_parte_equipo}}</td>
					<td>{{ $eq->estado_equipo}}</td>
					<td>{{ $eq->precio_referencial_equipo}}</td>
					<td>{{ $eq->observaciones_equipo}}</td>
					<td>{{ $eq->tipo_funcionamiento_equipo}}</td>
				</tr>
				@endforeach
			</tbody>
			</table>
</body>
</html>


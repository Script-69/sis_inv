<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table='equipo';
    protected $primaryKey='id_equipo';
    //public $incrementing = false;//le decimos que no es autoincrement en el id_sitio
    protected $keyType = 'string';//le decimos que la PK es del tipo String
    public $timestamps=false;

    protected $fillable =[ 
        'id_equipo',
        'id_sitio',
        'id_almacen',
        'id_proveedor',
        'nombre_equipo',
    	'descripcion_equipo',
        'marca_equipo',
        'pais_origen_equipo',
        'modelo_equipo',
        'numero-serie_equipo',
        'numero_parte_equipo',
    	'estado_equipo',
        'precio_referencial_equipo',
        'observaciones_equipo',
        'tipo_funcionamiento_equipo',
        'cantidad_equipo',
        'unidad_medida_equipo',


    					];
    protected $guarded =[
    	
    					];//
} 

 
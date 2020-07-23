<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table='almacen';
    protected $primaryKey='id_almacen';
    //public $incrementing = false;//le decimos que no es autoincrement en el id_sitio
    protected $keyType = 'string';//le decimos que la PK es del tipo String
    public $timestamps=false;

    protected $fillable =[
        'id_almacen',
        'id_sitio',
    	'descripcion_almacen',
    	'cantidad_equipo_almacen',
    	'estado_almacen',

    					];
    protected $guarded =[
    	
    					];//
} 


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitio extends Model
{
    protected $table='sitio';
    protected $primaryKey='id_sitio';
    //public $incrementing = false;//le decimos que no es autoincrement en el id_sitio
    protected $keyType = 'string';//le decimos que la PK es del tipo String
    public $timestamps=false;

    protected $fillable =[
        'id_sitio',
        'id_usuario',
        'nombre_sitio',
    	'departamento_sitio',
    	'provincia_sitio',
    	'localidad_sitio',
    	'telefono_sitio',

    					];
    protected $guarded =[
    	
    					];//
} 
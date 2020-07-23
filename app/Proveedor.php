<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedor';
    protected $primaryKey='id_proveedor';
    //public $incrementing = false;//le decimos que no es autoincrement en el id_sitio
    protected $keyType = 'string';//le decimos que la PK es del tipo String
    public $timestamps=false;

    protected $fillable =[
        'id_proveedor',
        'nombre_proveedor',
        'direccion_proveedor',
        'telefono_proveedor',
    	'correo_electronico_proveedor',
    					];
    protected $guarded =[
    	
    					];//
}

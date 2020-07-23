<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitacoraFalla extends Model
{
    protected $table='bitacora_falla';
    protected $primaryKey='id_bitacora_falla';
    //public $incrementing = false;//le decimos que no es autoincrement en el id_sitio
    protected $keyType = 'string';//le decimos que la PK es del tipo String
    public $timestamps=false;

    protected $fillable =[ 
    	'id_bitacora_falla',
        'id_sitio',
        'id_almacen',
        'id_equipo',
      	'id_usuario',
      	'descripcion_falla',
      	'estado_falla',


    					];
    protected $guarded =[
    	
    					];//
}
 
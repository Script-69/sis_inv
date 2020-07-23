<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table='usuario';
    protected $primaryKey='id_usuario';

    public $timestamps=false;

    protected $fillable =[
        'id_usuario',
    	'nombre_usuario',
    	'apellido_paterno_usuario',
    	'apellido_materno_usuario',
    	'celular_usuario',
    	'direccion_usuario',
    	'correo_electronico_usuario',
    	'grado_instruccion_usuario',
        'cargo_actual_usuario',
    	'estado_usuario',
    	'tipo_usuario',
        'acceso_usuario',
        'password',

    					];

}
 
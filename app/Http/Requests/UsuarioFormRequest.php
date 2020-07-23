<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_usuario'=>'required|max:20',
            'nombre_usuario'=>'required|max:50',
            'apellido_paterno_usuario'=>'required|max:60',
            'apellido_materno_usuario'=>'required|max:60',
            'celular_usuario'=>'required|numeric',
            'direccion_usuario'=>'required|max:120',
            'correo_electronico_usuario'=>'required|max:60',
            'grado_instruccion_usuario'=>'required|max:50',
            'estado_usuario'=>'required|max:20',
            'tipo_usuario'=>'required|max:20',
            'acceso_usuario'=>'max:20',
        ];
    }
}

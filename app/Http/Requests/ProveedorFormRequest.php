<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorFormRequest extends FormRequest
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
            'id_proveedor'=>'numeric|required|digits_between:6,12',
            'nombre_proveedor'=>'required|max:50',
            'direccion_proveedor'=>'required|max:100',
            'telefono_proveedor'=>'numeric|required|digits_between:6,8',
            'correo_electronico_proveedor'=>'required|max:60',

        ];
    }
}

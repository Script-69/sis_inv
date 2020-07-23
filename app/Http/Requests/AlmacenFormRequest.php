<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlmacenFormRequest extends FormRequest
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
            'id_almacen'=>'max:15',
            'id_sitio'=>'max:15',
            'descripcion_almacen'=>'required|max:200',
            'cantidad_equipo_almacen'=>'numeric',
            'estado_almacen'=>'required|max:50',
        ];
    }
}

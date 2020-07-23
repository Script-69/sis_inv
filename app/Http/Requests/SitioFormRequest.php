<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SitioFormRequest extends FormRequest
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
            'id_sitio'=>'max:15',
            'id_usuario'=>'required',
            'nombre_sitio'=>'required|max:50',
            'departamento_sitio'=>'max:30',
            'provincia_sitio'=>'max:20',
            'localidad_sitio'=>'max:20',
            'telefono_sitio'=>'numeric',
            
        ];
    }
}

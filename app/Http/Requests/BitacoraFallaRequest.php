<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BitacoraFallaRequest extends FormRequest
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
            'id_bitacora_falla',
            'id_sitio'=>'required',
            'id_almacen'=>'required',
            'id_equipo'=>'max:15',
            'id_usuario'=>'required',
            'descripcion_falla'=>'required|max:120',
            'estado_falla'=>'max:50'
        ];
    }
}

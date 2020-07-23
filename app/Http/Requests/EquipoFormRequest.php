<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipoFormRequest extends FormRequest
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
            'id_equipo'=>'max:15',
            'id_sitio'=>'required',
            'id_almacen'=>'required',
            'id_proveedor'=>'required',
            'nombre_equipo'=>'required|max:50',
            'descripcion_equipo'=>'required|max:120',
            'marca_equipo'=>'required|max:30',
            'pais_origen_equipo'=>'required|max:40',
            'modelo_equipo'=>'required|max:30',
            'numero_serie_equipo'=>'required|max:50',
            'numero_parte_equipo'=>'required|max:50',
            'estado_equipo'=>'required|max:30',
            'precio_referencial_equipo'=>'numeric|max:1000000',
            'observaciones_equipo'=>'required|max:30',
            'tipo_funcionamiento_equipo'=>'max:10',
            'cantidad_equipo'=>'numeric|max:1000000',
            'unidad_medida_equipo'=>'max:20',
        ];
    }
}

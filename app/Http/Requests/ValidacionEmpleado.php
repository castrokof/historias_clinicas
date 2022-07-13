<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionEmpleado extends FormRequest
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
            'nombres'  => 'required|max:100',
            'apellidos'  => 'required|max:100',
            'documento' => 'numeric|required|min:10000|max:9999999999',
            'tipo_documento' => 'required',
            'empresa_id' => 'required',
            'ciudad' => 'required',
            'pais' => 'required',
            'barrio' => 'required',
            'direccion' => 'required',
            'activo' => 'required'
            ];
    }
}

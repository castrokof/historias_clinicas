<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionArchivo extends FormRequest
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
            'nombre'  => 'required|unique:empresa|max:100',
            'documento' => 'numeric|unique:empresa|required|min:10000|max:9999999999',
            'tipo_documento' => 'required',
            'activo' => 'required'
            ];
            
 }
}
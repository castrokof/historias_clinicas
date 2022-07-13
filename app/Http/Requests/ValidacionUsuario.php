<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class ValidacionUsuario extends FormRequest
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

    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors);
        }
        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }


    public function rules()
    {
        if($this->route('id')){

        return [

            'papellido' => 'required',
            'pnombre' => 'required',
            'tipo_documento' => 'required',
            'documento'=> 'required',
            'email'  => 'required|email|max:100|unique:usuario,email,'.$this->route('id'),
            'activo'  => 'required',
            'celular' => 'required',
            'profesion' => 'required',
            'especialidad' => 'required',
            'activo' => 'required',
            'rol_id' => 'required|integer'
        ];

        }else{



        return [
            'usuario'  => 'required|max:50|unique:usuario,usuario,'.$this->route('id'),
            'papellido' => 'required',
            'pnombre' => 'required',
            'tipo_documento' => 'required',
            'documento'=> 'required',
            'password'  => 'required|min:6',
            'remenber_token'  => 'required|same:password',
            'email'  => 'required|email|max:100|unique:usuario,email,'.$this->route('id'),
            'activo'  => 'required',
            'celular' => 'required',
            'profesion' => 'required',
            'especialidad' => 'required',
            'activo' => 'required',
            'rol_id' => 'required|integer'


        ];


            }
        }



}

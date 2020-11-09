<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'password' => 'required|string|min:8|max:100',
            'confirm_password' => 'required|same:password',
        ];
    }

     /**
     * Mensajes para las validaciones
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El nombre de usuario es requerido.',
            'name.max' => 'El nombre de usuario debe ser menor a :max caracteres.',
            'email.required' => 'El correo electrónico es requerido.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'email.max' => 'El correo electrónico debe ser menor a :max caracteres.',
            'password.required' => 'Se requiere una contraseña.',
            'password.min' => 'Se requiere una contraseña de al menos :min caracteres.',
            'password.max' => 'La contraseña no puede ser mayor a :max caracteres.',
            'confirm_password.required' => 'Confirme su contraseña.',
            'confirm_password.same' => 'La confirmación de contraseña no coincide con la introducida anteriormente.',
        ];
    }
}

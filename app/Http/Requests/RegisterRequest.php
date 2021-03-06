<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:5',
            'nickname' => ['required', 'regex:/^\w+$/i', 'min:3', 'unique:users,nickname'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'regex:/[A-Z]/', 'regex:/[a-z]/', 'regex:/\d/'],
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'El campo contraseña debe contener al menos una mayúscula, una minúscula y un número.',
        ];
    }
}

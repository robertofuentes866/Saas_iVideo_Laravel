<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Transformers\UserTransformer;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|max:255',
            'email'=>'required|email|max:255|unique:users',
            'password'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.max:255' => 'El nombre no puede ser mayor que 255 caracteres',
            'email.required' => 'El correo es obligatorio',
            'password.required' => 'La contraseña es obligatorio',
        ];
    }
}
